<?php
trait a {
  private $name='Frank';
  public function show() {
    parent::show();
    echo $this->name."\n";
  }
}

class b {
  public function show() {
    echo "Nice! ";
  }
}

class c extends b {
  use a;
}

$a = new c;
$a->show();
//如果class c也定義了show()方法，那執行的就會是c的show()方法，而不是從Traits中取得的方法。
//而parent::show()，仍是定義在class b中的show()。