<?php

declare(strict_types=1);

/*
 * This file is part of the Contao GLightbox extension.
 *
 * (c) inspiredminds
 *
 * @license LGPL-3.0-or-later
 */

/*
 * Erweiterung der Seitenlayout-Tabelle (tl_layout) um einen eigenen Abschnitt
 * "GLightbox". Die hier definierten Felder werden vom Template js_glightbox
 * bzw. der Hilfsklasse GLightboxOptions ausgelesen und als Optionen an
 * GLightbox übergeben. Ein leerer Wert bedeutet immer: Option nicht übergeben,
 * GLightbox behält seine eigene Voreinstellung.
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Gemeinsame Einstellungen für die dreistufigen Ja/Nein-Felder
// (leer = Standard, "1" = Ja, "0" = Nein).
$glightboxTristate = [
    'inputType' => 'select',
    'options' => ['1', '0'],
    'reference' => &$GLOBALS['TL_LANG']['tl_layout']['glightbox_tristate'],
    'eval' => ['includeBlankOption' => true, 'blankOptionLabel' => &$GLOBALS['TL_LANG']['tl_layout']['glightbox_default'], 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 1, 'default' => ''],
];

// Gemeinsame Einstellungen für die Auswahlfelder mit festen Werten.
$glightboxSelect = static fn (array $options, int $length = 16): array => [
    'inputType' => 'select',
    'options' => $options,
    'reference' => &$GLOBALS['TL_LANG']['tl_layout']['glightbox_values'],
    'eval' => ['includeBlankOption' => true, 'blankOptionLabel' => &$GLOBALS['TL_LANG']['tl_layout']['glightbox_default'], 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => $length, 'default' => ''],
];

// Erscheinungsbild und Effekte
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_openEffect'] = $glightboxSelect(['zoom', 'fade', 'none']);
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_closeEffect'] = $glightboxSelect(['zoom', 'fade', 'none']);
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_slideEffect'] = $glightboxSelect(['slide', 'fade', 'zoom', 'none']);
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_descPosition'] = $glightboxSelect(['bottom', 'top', 'left', 'right']);

// Verhalten (Ja/Nein/Standard)
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_loop'] = $glightboxTristate;
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_zoomable'] = $glightboxTristate;
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_draggable'] = $glightboxTristate;
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_keyboardNavigation'] = $glightboxTristate;
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_closeOnOutsideClick'] = $glightboxTristate;

// Der Skin ist ein freies Textfeld, weil eigene Skins per CSS möglich sind.
// Vorgeschlagen wird der mitgelieferte Skin "clean".
$GLOBALS['TL_DCA']['tl_layout']['fields']['glightbox_skin'] = [
    'inputType' => 'text',
    'eval' => ['maxlength' => 32, 'rgxp' => 'alias', 'tl_class' => 'w50', 'placeholder' => 'clean'],
    'sql' => ['type' => 'string', 'length' => 32, 'default' => ''],
];

// Eigener, standardmäßig eingeklappter Abschnitt "GLightbox" hinter dem
// Skript-Abschnitt des Seitenlayouts.
PaletteManipulator::create()
    ->addLegend('glightbox_legend', 'script_legend', PaletteManipulator::POSITION_AFTER, true)
    ->addField(
        [
            'glightbox_skin',
            'glightbox_descPosition',
            'glightbox_openEffect',
            'glightbox_closeEffect',
            'glightbox_slideEffect',
            'glightbox_loop',
            'glightbox_zoomable',
            'glightbox_draggable',
            'glightbox_keyboardNavigation',
            'glightbox_closeOnOutsideClick',
        ],
        'glightbox_legend',
        PaletteManipulator::POSITION_APPEND
    )
    ->applyToPalette('default', 'tl_layout')
;

unset($glightboxTristate, $glightboxSelect);
