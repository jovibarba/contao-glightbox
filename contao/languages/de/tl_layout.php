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
 * Deutsche Beschriftungen für den Abschnitt "GLightbox" im Seitenlayout.
 */

$GLOBALS['TL_LANG']['tl_layout']['glightbox_legend'] = 'GLightbox';

// Beschriftung für den leeren Eintrag in den Auswahlfeldern
$GLOBALS['TL_LANG']['tl_layout']['glightbox_default'] = 'Standard (Voreinstellung von GLightbox)';

// Beschriftungen der Ja/Nein-Werte
$GLOBALS['TL_LANG']['tl_layout']['glightbox_tristate']['1'] = 'Ja';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_tristate']['0'] = 'Nein';

// Beschriftungen der festen Auswahlwerte
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['zoom'] = 'Zoom (vergrößern/verkleinern)';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['fade'] = 'Einblenden (weicher Übergang)';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['slide'] = 'Schieben (seitliches Wischen)';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['none'] = 'Kein Effekt';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['bottom'] = 'Unten';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['top'] = 'Oben';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['left'] = 'Links';
$GLOBALS['TL_LANG']['tl_layout']['glightbox_values']['right'] = 'Rechts';

// Felder: [0] = Bezeichnung, [1] = Erklärung
$GLOBALS['TL_LANG']['tl_layout']['glightbox_skin'] = ['Skin (Design)', 'Name des CSS-Skins für die Lightbox. Leer lassen für den mitgelieferten Skin „clean“. Ein eigener Name erzeugt die CSS-Klasse „glightbox-NAME“, für die Sie eigene Stile hinterlegen können.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_descPosition'] = ['Position der Beschreibung', 'Legt fest, wo Bildunterschrift bzw. Beschreibung angezeigt wird. Standard: Unten.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_openEffect'] = ['Effekt beim Öffnen', 'Animation, mit der die Lightbox erscheint. Standard: Zoom.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_closeEffect'] = ['Effekt beim Schließen', 'Animation, mit der die Lightbox verschwindet. Standard: Zoom.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_slideEffect'] = ['Effekt beim Bildwechsel', 'Animation beim Wechsel zwischen den Bildern einer Galerie. Standard: Schieben.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_loop'] = ['Endlosschleife', 'Nach dem letzten Bild einer Galerie wieder beim ersten beginnen. Standard: Nein.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_zoomable'] = ['Bilder zoombar', 'Bilder können in der Lightbox per Klick oder Geste vergrößert werden. Standard: Ja.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_draggable'] = ['Ziehen/Wischen erlauben', 'Bildwechsel per Maus-Ziehen oder Wischgeste auf Touch-Geräten. Standard: Ja.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_keyboardNavigation'] = ['Tastatursteuerung', 'Bedienung mit den Pfeiltasten (Bildwechsel) und Escape (Schließen). Standard: Ja.'];
$GLOBALS['TL_LANG']['tl_layout']['glightbox_closeOnOutsideClick'] = ['Schließen bei Klick daneben', 'Die Lightbox schließt sich, wenn außerhalb des Bildes geklickt wird. Standard: Ja.'];
