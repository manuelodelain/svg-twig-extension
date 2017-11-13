<?php

namespace manuelodelain\Twig\Extension;

/**
 *
 */

class SvgExtension extends \Twig_Extension
{
  public function __construct($basePath = ''){
    $this->basePath = $basePath;
  }

  public function getName(){
    return 'svgTwigExtension';
  }

  public function getFunctions(){
    $parentFunctions = parent::getFunctions();

    array_push(
      $parentFunctions, 
      new \Twig_SimpleFunction('svg', array($this, 'getSvg'), array("is_safe" => array("html")))
    );

    return $parentFunctions;
  }

  public function getSvg($path, $params = []) {
    if (strlen($this->basePath) > 0){
      $fullPath = $this->basePath . '/' . $path;
    }else{
      $fullPath = $path;
    }

    $ext = substr($fullPath, -4);

    if ($ext !== '.svg'){
      $fullPath .= '.svg';
    }

    $fullPath = realpath($fullPath);
    
    $svgString = file_get_contents($fullPath);

    $hasAttr = array_key_exists('attr', $params);
    $hasClasses = array_key_exists('classes', $params);

    if ($hasAttr || $hasClasses){
      $svg = simplexml_load_string($svgString);
      $attrs = $svg->attributes();
    }

    if ($hasAttr){
      foreach ($params['attr'] as $key => $value) {
        if ($attrs[$key]){
          $attrs[$key] = $value;
        }else{
          $svg->addAttribute($key, $value);
        }
      }
    }

    if ($hasClasses){
      if ($attrs['class']){
        $attrs['class'] .= ' ' . $params['classes'];
      }else{
        $svg->addAttribute('class', $params['classes']);
      }
    }

    if ($hasAttr || $hasClasses){
      // remove annoying xml version added by asXML method    
      $svgString = str_replace("<?xml version=\"1.0\"?>\n", '', $svg->asXML());
    }

    return $svgString;
  }
}

