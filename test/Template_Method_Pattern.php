<?php
trait Tag {
	abstract function prefix();
	abstract function postfix();
	function tag($name) {
		echo $this->prefix().$name.$this->postfix()."\n";
	}
}
class HtmlOpenTag {
	use Tag;
	function prefix() {
		return '<';
	}
	function postfix() {
		return '>';
	}
}
class HtmlCloseTag {
	use Tag;
	function prefix() {
		return '</';
	}
	function postfix() {
		return '>';
	}
}
class BbcodeOpenTag {
	use Tag;
	function prefix() {
		return '[ ';
	}
	function postfix() {
		return ']';
	}
}
class BbcodeCloseTag {
	use Tag;
	function prefix() {
		return '[ /';
	}
	function postfix() {
		return ']';
	}
}
$c = new HtmlOpenTag;
$c->tag('div');
$d = new HtmlCloseTag;
$d->tag('div');
$e = new BbcodeOpenTag;
$e->tag('url');
$f = new BbcodeCloseTag;
$f->tag('url');