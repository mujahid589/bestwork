<?php

#Accepting Parameters & Defining Pages
$url=explode('/',$_SERVER['REQUEST_URI']);
define('page',$url[1]);
if(!empty($url[2])){
define('param1',$url[2]);
}else{
  define('param1',"");

}
if(!empty($url[3])){
define('param2',$url[3]);
}
else{
  define('param2',"");

}
if(!empty($url[4])){
define('param3',$url[4]);
}
else {
  define('param3',"");
  // code...
}
if(!empty($url[5])){
define('param4',$url[4]);
}
else {
  // code...
  define('param4',"");
}


 ?>
