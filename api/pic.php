<?php
/*
 * Theme: Castle
 * Link: https://github.com/ohmyga233/castle-Typecho-Theme
 * Author: ohmyga (https://ohmyga.net/)
 * 这是一个随机图API
 * 这是我见过最垃圾的api了（逃
 *
 */
 
//GET取请求类型
$l = $_GET['l'];

//设置编码为UTF-8
header('Content-Type: text/html; charset=UTF-8');

if ($l == "1"){
$img_array = glob("wimg/*.jpg",GLOB_BRACE);

$img = array_rand($img_array);

header("location: $img_array[$img]");
}

if ($l == "2"){
$img_array = glob("wimg/*.jpg",GLOB_BRACE);

$img = array_rand($img_array);

header("location: $img_array[$img]");
}

if ($l == "3"){
$img_array = glob("wimg/*.jpg",GLOB_BRACE);

$img = array_rand($img_array);

header("location: $img_array[$img]");
}

if ($l == "4"){
$img_array = glob("wimg/*.jpg",GLOB_BRACE);

$img = array_rand($img_array);

header("location: $img_array[$img]");
}

if ($l == "5"){
$img_array = glob("wimg/*.jpg",GLOB_BRACE);

$img = array_rand($img_array);

header("location: $img_array[$img]");
}

?>