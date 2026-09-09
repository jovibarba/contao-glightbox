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

use Contao\ContentElement;
use Contao\ContentModel;
use Contao\StringUtil;

/**
 * Hört auf den Contao-Erweiterungspunkt "getContentElement", der nach dem
 * Rendern jedes einzelnen Inhaltselements aufgerufen wird und dessen
 * fertigen HTML-Code noch einmal anpassen darf.
 *
 * Bei einer Galerie mit gesetzten GLightbox-Feldern (siehe GalleryOptions)
 * wird hier das "data-glightbox"-Attribut in den HTML-Code der Bild-Links
 * dieser einen Galerie eingefügt.
 */
final class GetContentElementListener
{
    public function onGetContentElement(ContentModel $model, string $buffer, ContentElement $element): string
    {
        if ('gallery' !== $model->type) {
            return $buffer;
        }

        $options = GalleryOptions::fromModel($model);

        if ([] === $options) {
            return $buffer;
        }

        $dataAttribute = GalleryOptions::toDataAttribute($options);

        // Contao vergibt für die Bilder einer Galerie die Gruppen-Kennung
        // "lb<ID des Inhaltselements>" als data-lightbox-Attribut. Da diese
        // Kennung eindeutig ist, reicht ein einfacher Text-Ersatz, um das
        // zusätzliche Attribut nur bei den Bildern dieser einen Galerie
        // einzufügen.
        $search = \sprintf('data-lightbox="lb%s"', $model->id);
        $replace = \sprintf('data-lightbox="lb%s" data-glightbox="%s"', $model->id, StringUtil::specialchars($dataAttribute));

        return str_replace($search, $replace, $buffer);
    }
}
