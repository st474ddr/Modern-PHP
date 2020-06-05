<?php
//index.php
include_once __DIR__ . "\autoload.php";

//遇到namespace就會觸發autoload
$myClass = new \MyNamespace\MyClass();
$myClass->doSomething();

$member = new \MyNamespace\Member\Member();
$member->getMemberList();

$mailler = new \MyNamespace\Email\Mailler();
$mailler->sendMail();