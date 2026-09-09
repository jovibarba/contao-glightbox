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
 * Registriert den Contao-Hook "getContentElement". Er wird nach dem
 * Rendern jedes einzelnen Inhaltselements aufgerufen und erlaubt es,
 * dessen HTML-Code noch anzupassen. Wird hier genutzt, um bei
 * Galerie-Elementen mit gesetzten GLightbox-Feldern das
 * "data-glightbox"-Attribut in die Bild-Links einzufügen.
 */
$GLOBALS['TL_HOOKS']['getContentElement'][] = [InspiredMinds\ContaoGLightbox\GetContentElementListener::class, 'onGetContentElement'];
