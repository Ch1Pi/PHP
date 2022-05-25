<?php
$mysqli = new mysqli("localhost","root","","sportclub");
if(!$mysqli){
    die('Error connection');
}