# Svg Twig extension

Add inline svg with Twig version 2 or 3

## Installation

With Composer:
```composer require manuelodelain/svg-twig-extension```

## Usage

```
use manuelodelain\Twig\Extension\SvgExtension;
use Twig\Environment;

$twig = new Environment(...);

$twig->addExtension(new SvgExtension());
```

```
{{ svg('img.svg') }}
```

Will output your svg file inline.

You can omit the extension
```
{{ svg('img') }}
```

You can add a global base path:
```
new SvgExtension('assets/img')
```

## Options

Add or replace attributes with the `attr` property:
```
{{ svg('img.svg', {attr: {class: 'inline-svg', id: 'marker-1'}}) }}
```

Add CSS classes:
```
{{ svg('img.svg', {classes: 'add-classname another-classname'}) }}
```

