# Linkify Twig extension

Use [Linkify](https://github.com/misd-service-development/php-linkify) in your twig template.

## Installation

With Composer:
```composer require manuelodelain/linkify-twig-extension```

## Usage

```
use manuelodelain\Twig\Extension\LinkifyExtension;

$twig = new Twig_Environment(...);

$twig->addExtension(new LinkifyExtension());
```

```
{{ 'Lorem ipsum ... www.website.com ...'|linkify }}
```

Will output:
```
Lorem ipsum ... <a href="www.website.com">www.website.com</a> ...
```

Don't forget to apply the `raw` filter for an HTML output:
```
{{ 'Lorem ipsum ... www.website.com ...'|linkify|raw }}
```

## Options

As Linkify, set default options at the instanciation or at the method call.

At the instanciation (applied to all links):
```
use manuelodelain\Twig\Extension\LinkifyExtension;

$twig = new Twig_Environment(...);

$twig->addExtension(new LinkifyExtension(array('attr' => array('target' => '_blank'))));
```

At the method call:
```
{{ 'Lorem ipsum ... www.website.com ...'|linkify({"attr": {"target": "_blank"}}) }}
```

Will output:
```
Lorem ipsum ... <a href="www.website.com" target="_blank">www.website.com</a> ...
```

[See the Linkify options](https://github.com/misd-service-development/php-linkify#options)





