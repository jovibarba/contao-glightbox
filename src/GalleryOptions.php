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

use Contao\ContentModel;

/**
 * Baut aus den GLightbox-Feldern eines Galerie-Inhaltselements die Werte,
 * die als "data-glightbox"-Attribut an die einzelnen Bild-Links dieser
 * Galerie angehängt werden. GLightbox liest dieses Attribut pro Bild aus
 * und überschreibt damit nur für diese Bilder die globale Voreinstellung
 * aus dem Seitenlayout.
 *
 * Wichtig: GLightbox erlaubt so nur wenige Optionen pro Bild. Nicht alle
 * Layout-Optionen lassen sich hier abbilden, siehe STRING_OPTIONS und
 * BOOLEAN_OPTIONS.
 */
final class GalleryOptions
{
    /**
     * Auswahlfelder: Backend-Feld => GLightbox-Option (Zeichenkette).
     */
    private const STRING_OPTIONS = [
        'glightbox_effect' => 'effect',
        'glightbox_descPosition' => 'descPosition',
    ];

    /**
     * Ja/Nein-Felder: Backend-Feld => GLightbox-Option (true/false).
     */
    private const BOOLEAN_OPTIONS = [
        'glightbox_zoomable' => 'zoomable',
        'glightbox_draggable' => 'draggable',
    ];

    /**
     * Ermittelt die gesetzten Optionen eines Galerie-Elements.
     *
     * @return array<string, string|bool>
     */
    public static function fromModel(ContentModel $model): array
    {
        $options = [];

        foreach (self::STRING_OPTIONS as $field => $option) {
            $value = trim((string) ($model->{$field} ?? ''));

            if ('' !== $value) {
                $options[$option] = $value;
            }
        }

        foreach (self::BOOLEAN_OPTIONS as $field => $option) {
            $value = (string) ($model->{$field} ?? '');

            // "1" = Ja, "0" = Nein, alles andere = nicht gesetzt
            if ('1' === $value || '0' === $value) {
                $options[$option] = '1' === $value;
            }
        }

        return $options;
    }

    /**
     * Wandelt die Optionen in die Zeichenkette um, die GLightbox im
     * "data-glightbox"-Attribut erwartet, z.B. "effect: fade; zoomable: false;".
     *
     * Gibt eine leere Zeichenkette zurück, wenn keine Optionen gesetzt sind.
     *
     * @param array<string, string|bool> $options
     */
    public static function toDataAttribute(array $options): string
    {
        if ([] === $options) {
            return '';
        }

        $parts = [];

        foreach ($options as $key => $value) {
            // GLightbox erwartet die Wörter "true"/"false", keine "1"/"0".
            $stringValue = \is_bool($value) ? ($value ? 'true' : 'false') : $value;
            $parts[] = $key . ': ' . $stringValue . ';';
        }

        return implode(' ', $parts);
    }
}
