<?php
//__set($name, $value)：如果想要寫入物件無法存取的屬性，就會觸發這個方法
//__get($name)：如果想要讀取物件無法存取的屬性，就會觸發這個方法
//__isset($name)：如果想要用isset()或是empty()判斷物件所無法存取的屬性是否存在或為空，就會觸發這個方法
//__unset($name)：如果想要用unset()來清除物件無法存取的屬性，就會觸發這個方法

class a {
  function __get($name) {
    if($name==='var1') return 'abc';
  }
}

$a = new a;
echo $a->var1."\n";
echo $a->var2."\n";

class b {
  private $var1 = 'abc';
  private $var2 = 'def';
  function __get($name) {
    switch($name) {
      case 'var1': 
        return $this->var1;
        break;
      case 'var2':
        return 'ghi';
        break;
    }
  }
}

$b = new b;
echo $b->var1."\n";
echo $b->var2."\n";

class c {}

$c = new c;
echo $c->var1."\n";