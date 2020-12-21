<?php

#Accepting Parameters & Defining Pages

$url=explode('/',$_SERVER['REQUEST_URI']);
define('page',$url[1]);
if(!empty($url[2])){
define('param1',$url[2]);
}
if(!empty($url[3])){
define('param2',$url[3]);
}
if(!empty($url[4])){
define('param3',$url[4]);
}


 ?>
