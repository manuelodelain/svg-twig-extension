<?php

require('../vendor/autoload.php');

use manuelodelain\Twig\Extension\SvgExtension;

$loader = new Twig_Loader_Array(array(
  'base' => "{{ svg('marker') }}",
  'options' => "{{ svg('marker', {classes: 'special-marker', attr: {class: 'inline-svg', id: 'marker-1'}}) }}",
));

$twig = new Twig_Environment($loader);

$twig->addExtension(new SvgExtension());

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <h1>Svg Twig extension</h1>

  <h2>Base</h2>
  <?php echo $twig->render('base'); ?>

  <h2>Options</h2>
  <?php echo $twig->render('options'); ?>
</body>
</html>