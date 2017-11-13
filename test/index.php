<?php

require('../vendor/autoload.php');

use manuelodelain\Twig\Extension\LinkifyExtension;

$text = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem www.google.com. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</p>';

$loader = new Twig_Loader_Array(array(
  'base' => '{{ text|linkify|raw }}',
  'options' => '{{ text|linkify({"attr": {"target": "_blank"}})|raw }}'
));

$twig = new Twig_Environment($loader);

$twig->addExtension(new LinkifyExtension());

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <h1>Tests Linkify Twig extension</h1>

  <h2>Base</h2>
  <?php echo $twig->render('base', array('text' => $text)); ?>

  <h2>Options</h2>
  <?php echo $twig->render('options', array('text' => $text)); ?>
</body>
</html>