<?php
trait EventEmitter {
  private $events = array();
  public function on($event, $callback) {
    if(!isset($this->events[$event])) {
      $this->events[$event] = array();
    }
    $this->events[$event][] = $callback;
  }
  public function emit() {
    $arguments = func_get_args();
    $event = array_shift($arguments);
    if(isset($this->events[$event])) {
      foreach($this->events[$event] as $handler) {
        call_user_func_array($handler, $arguments);
      }
    }
  }
}
class StringChuckSplit {
  use EventEmitter;
  private $str='';
  function __construct($str) {
    $this->str = $str;
  }
  function split($delimiter) {
    $r = explode($delimiter, $this->str);
    try {
      foreach($r as $s) {
        $this->emit('chuck', null, $s);
      }
    }
    catch(Exception $e) {
      $this->emit('chuck', $e, null);
    }
  }
}
function test($str, $prefix, $postfix) {
  $c = new StringChuckSplit($str);
  $c->on('chuck', function($err, $data) use($prefix, $postfix) {
    if(!$err) {
      echo $prefix.$data.$postfix."\n";
    }
  });
  echo "<ul>\n";
  $c->split(',');
  echo "</ul>\n";
}
test('ab,cd,ef,g', '  <li>', '</li>');