<?php
$string="vishal";
echo "<br>length of my string is : ".strlen($string); // joined two string and statements by using . dot

$c_name="vishal chouhan is my complete name";
echo "<br>words on my string : ".str_word_count($c_name);

echo "<br>my name in reverse form : ".strrev($string);

echo "<br>position of chouhan is : ".strpos($c_name,"chouhan");

echo "<br>change my name : ".str_replace("vishal","vishal chouhan",$string);

echo "<br>".str_repeat($string,10)."<br>";

$space="       vishal       ";
echo "<pre>";
echo rtrim($space)."textfor testing";// remove right side space
echo "<br>";
echo ltrim($space)."textfor testing";//remove left side space
echo "</pre>";
?>