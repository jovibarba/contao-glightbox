<?php

declare(strict_types=1);

/*
 * This file is part of the Contao GLightbox extension.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

namespace InspiredMinds\ContaoGLightbox;

use Contao\LayoutModel;

/**
 * Baut aus den GLightbox-Feldern eines Seitenlayouts das Options-Array,
 * das im Template an GLightbox() übergeben wird.
 *
 * Grundregel: Nur Felder, die im Backend tatsächlich gesetzt wurden, landen
 * im Ergebnis. Leere Felder werden weggelassen, damit GLightbox seine eigene
 * Voreinstellung verwendet.
 */
final class GLightboxOptions
{
    /**
     * Auswahlfelder: Backend-Feld => GLightbox-Option (Zeichenkette).
     */
    private const STRING_OPTIONS = [
        'glightbox_skin' => 'skin',
        'glightbox_openEffect' => 'openEffect',
        'glightbox_closeEffect' => 'closeEffect',
        'glightbox_slideEffect' => 'slideEffect',
        'glightbox_descPosition' => 'descPosition',
    ];

    /**
     * Ja/Nein-Felder: Backend-Feld => GLightbox-Option (true/false).
     */
    private const BOOLEAN_OPTIONS = [
        'glightbox_loop' => 'loop',
        'glightbox_zoomable' => 'zoomable',
        'glightbox_draggable' => 'draggable',
        'glightbox_keyboardNavigation' => 'keyboardNavigation',
        'glightbox_closeOnOutsideClick' => 'closeOnOutsideClick',
    ];

    /**
     * Ermittelt die Optionen für das Layout der aktuell ausgegebenen Seite.
     *
     * Contao schreibt beim Rendern einer Seite die Layout-ID in das globale
     * Seitenobjekt. Darüber wird das Layout nachgeladen, weil die
     * JavaScript-Templates das Layout nicht direkt übergeben bekommen.
     *
     * @return array<string, string|bool>
     */
    public static function forCurrentPage(): array
    {
        $layoutId = (int) ($GLOBALS['objPage']->layoutId ?? 0);

        if ($layoutId < 1) {
            return [];
        }

        $layout = LayoutModel::findById($layoutId);

        if (null === $layout) {
            return [];
        }

        return self::fromLayout($layout);
    }

    /**
     * Ermittelt die Optionen aus einem beliebigen Layout.
     *
     * @return array<string, string|bool>
     */
    public static function fromLayout(LayoutModel $layout): array
    {
        $options = [];

        foreach (self::STRING_OPTIONS as $field => $option) {
            $value = trim((string) ($layout->{$field} ?? ''));

            if ('' !== $value) {
                $options[$option] = $value;
            }
        }

        foreach (self::BOOLEAN_OPTIONS as $field => $option) {
            $value = (string) ($layout->{$field} ?? '');

            // "1" = Ja, "0" = Nein, alles andere = nicht gesetzt
            if ('1' === $value || '0' === $value) {
                $options[$option] = '1' === $value;
            }
        }

        return $options;
    }
}
