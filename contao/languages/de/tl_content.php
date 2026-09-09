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
 * Deutsche Beschriftungen für den Abschnitt "GLightbox" am Galerie-Element.
 */

$GLOBALS['TL_LANG']['tl_content']['glightbox_legend'] = 'GLightbox (nur für diese Galerie)';

$GLOBALS['TL_LANG']['tl_content']['glightbox_default'] = 'Standard (aus dem Seitenlayout übernehmen)';

$GLOBALS['TL_LANG']['tl_content']['glightbox_tristate']['1'] = 'Ja';
$GLOBALS['TL_LANG']['tl_content']['glightbox_tristate']['0'] = 'Nein';

$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['zoom'] = 'Zoom (vergrößern/verkleinern)';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['fade'] = 'Einblenden (weicher Übergang)';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['slide'] = 'Schieben (seitliches Wischen)';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['none'] = 'Kein Effekt';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['bottom'] = 'Unten';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['top'] = 'Oben';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['left'] = 'Links';
$GLOBALS['TL_LANG']['tl_content']['glightbox_values']['right'] = 'Rechts';

// Felder: [0] = Bezeichnung, [1] = Erklärung
$GLOBALS['TL_LANG']['tl_content']['glightbox_effect'] = ['Effekt', 'Ersetzt für die Bilder dieser Galerie den im Seitenlayout eingestellten Effekt (Öffnen, Schließen und Bildwechsel gemeinsam) durch einen einzigen, hier gewählten Effekt. Betrifft nur diese Galerie.'];
$GLOBALS['TL_LANG']['tl_content']['glightbox_descPosition'] = ['Position der Beschreibung', 'Überschreibt für diese Galerie, wo Bildunterschrift bzw. Beschreibung angezeigt wird.'];
$GLOBALS['TL_LANG']['tl_content']['glightbox_zoomable'] = ['Bilder zoombar', 'Überschreibt für diese Galerie, ob die Bilder in der Lightbox vergrößert werden können.'];
$GLOBALS['TL_LANG']['tl_content']['glightbox_draggable'] = ['Ziehen/Wischen erlauben', 'Überschreibt für diese Galerie, ob per Ziehen oder Wischgeste zwischen den Bildern gewechselt werden kann.'];

// Hinweistext, der Redakteuren im Abschnitt erklärt, was hier NICHT geht.
$GLOBALS['TL_LANG']['tl_content']['glightbox_hint'] = 'Hinweis: Skin, Endlosschleife, Tastatursteuerung und "Schließen bei Klick daneben" lassen sich nur einmal für die ganze Seite im Seitenlayout einstellen, nicht pro Galerie.';
