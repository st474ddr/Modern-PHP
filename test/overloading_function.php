<?php
class a {
  function __call($name, $args) {
    echo $name . " : " . print_r($args, true) . "\n";
  }
}

$a = new a;
$a->func1('abc', 'def');

class b {
  function __call($name, $args) {
    switch($name) {
      case 'add':
        if(count($args)===2) {
          if(is_numeric($args[0]) && is_numeric($args[1]))
            return $args[0]+$args[1];
          if(is_string($args[0]) && is_string($args[1]))
            return $args[0].$args[1];
        }
      default:
        throw new Exception("[warning] b::$name method not found.\n");
    }
  }
}

$b = new b;
echo $b->add(2,3)."\n";
echo $b->add('hello', ' world.')."\n";
try {
  echo $b->add(2, ' world.')."\n";  
}
catch (Exception $e) {
  echo $e->getMessage();
}