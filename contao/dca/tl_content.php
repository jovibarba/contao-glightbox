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
 * Erweiterung des Galerie-Inhaltselements (tl_content, Typ "gallery") um
 * einen eigenen Abschnitt "GLightbox", mit dem sich vier Optionen speziell
 * für diese eine Galerie überschreiben lassen. Anders als die Einstellungen
 * im Seitenlayout gelten diese nur für die Bilder dieser einen Galerie und
 * ersetzen dort die Layout-Voreinstellung.
 *
 * Wichtig: GLightbox erlaubt technisch nur eine kleine Auswahl an Optionen
 * pro einzelnem Bild. Skin, Endlosschleife, Tastatursteuerung und Schließen
 * bei Klick daneben gelten immer nur global fürs ganze Layout und lassen
 * sich hier bewusst nicht setzen.
 */

use Contao\ContentModel;
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;
use Contao\Input;
use Contao\Message;

// Kurzer Hinweis im Bearbeitungsformular der Galerie, der erklärt, dass
// einige GLightbox-Optionen bewusst nur im Seitenlayout einstellbar sind
// (dieselbe Technik, mit der Contao selbst den Colorbox/Mediabox-Hinweis
// für Galerien anzeigt).
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = static function (DataContainer $dc): void {
    if (Input::get('act') !== 'edit' || !$dc->id) {
        return;
    }

    $model = ContentModel::findById($dc->id);

    if (null === $model || 'gallery' !== $model->type) {
        return;
    }

    Message::addInfo($GLOBALS['TL_LANG']['tl_content']['glightbox_hint']);
};

// Gemeinsame Einstellungen für die dreistufigen Ja/Nein-Felder
// (leer = aus dem Seitenlayout übernehmen, "1" = Ja, "0" = Nein).
$glightboxTristate = [
    'inputType' => 'select',
    'options' => ['1', '0'],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['glightbox_tristate'],
    'eval' => ['includeBlankOption' => true, 'blankOptionLabel' => &$GLOBALS['TL_LANG']['tl_content']['glightbox_default'], 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 1, 'default' => ''],
];

// Gemeinsame Einstellungen für die Auswahlfelder mit festen Werten.
$glightboxSelect = static fn (array $options, int $length = 16): array => [
    'inputType' => 'select',
    'options' => $options,
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['glightbox_values'],
    'eval' => ['includeBlankOption' => true, 'blankOptionLabel' => &$GLOBALS['TL_LANG']['tl_content']['glightbox_default'], 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => $length, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['glightbox_effect'] = $glightboxSelect(['zoom', 'fade', 'slide', 'none']);
$GLOBALS['TL_DCA']['tl_content']['fields']['glightbox_descPosition'] = $glightboxSelect(['bottom', 'top', 'left', 'right']);
$GLOBALS['TL_DCA']['tl_content']['fields']['glightbox_zoomable'] = $glightboxTristate;
$GLOBALS['TL_DCA']['tl_content']['fields']['glightbox_draggable'] = $glightboxTristate;

// Eigener, standardmäßig eingeklappter Abschnitt "GLightbox" direkt hinter
// dem Bild-Abschnitt des Galerie-Elements.
PaletteManipulator::create()
    ->addLegend('glightbox_legend', 'image_legend', PaletteManipulator::POSITION_AFTER, true)
    ->addField(
        [
            'glightbox_effect',
            'glightbox_descPosition',
            'glightbox_zoomable',
            'glightbox_draggable',
        ],
        'glightbox_legend',
        PaletteManipulator::POSITION_APPEND
    )
    ->applyToPalette('gallery', 'tl_content')
;

unset($glightboxTristate, $glightboxSelect);
