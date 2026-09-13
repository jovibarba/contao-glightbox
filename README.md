[![](https://img.shields.io/packagist/v/jovibarba/contao-glightbox.svg)](https://packagist.org/packages/jovibarba/contao-glightbox)

> **Fork** von [inspiredminds/contao-glightbox](https://github.com/inspiredminds/contao-glightbox) mit zwei Ergänzungen:
> GLightbox-Optionen sind im Seitenlayout konfigurierbar und pro Galerie-Element überschreibbar.
> Das Paket ersetzt das Original (`replace`), beide dürfen nicht gleichzeitig installiert sein.
> Installation: `composer require jovibarba/contao-glightbox`

Contao GLightbox
=========================

Contao extension to integrate [GLightbox](https://biati-digital.github.io/glightbox/). To enable, activate the `js_glightbox` JavaScript template in your page layout (disable any other lightbox integrations). Create your own custom template in order to customise the GLightbox [options](https://github.com/biati-digital/glightbox/blob/master/README.md#lightbox-options).

To use it with the modern Twig layout:

```twig
{# templates/page/layout.html.twig #}

{% block body_content %}
    {{ parent() }}
    {{ include('@Contao/js_glightbox') }}
{% endblock %}
```

Backend configuration
---------------------

The most common GLightbox options can be configured per page layout in the Contao back end (section "GLightbox" in the page layout). Options left at "Default" are not passed to GLightbox, so its built-in defaults apply. Run the database migration (`contao:migrate`) after installing or updating the extension.
