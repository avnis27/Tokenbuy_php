<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Action{
	require_once 'webcamClass.php';
	$webcamClass=new webcamClass();
	echo $webcamClass->showImage();
}