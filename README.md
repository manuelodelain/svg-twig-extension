# Svg Twig extension

Add inline svg with Twig

## Installation

With Composer:
```composer require manuelodelain/svg-twig-extension```

## Usage

```
use manuelodelain\Twig\Extension\SvgExtension;

$twig = new Twig_Environment(...);

$twig->addExtension(new SvgExtension());
```

```
{{ svg('file.svg') }}
```

Will output your svg file inline.

You can ommit the extension
```
{{ svg('file') }}
```

## Options

Add or replace attributes with the `attr` property:
```
{{ svg('marker', {attr: {class: 'inline-svg', id: 'marker-1'}}) }}
```

Add CSS classes:
```
{{ svg('marker', {classes: 'add-classname another-classname'}) }}
```

