<?php 
	//tao cac bien mac dinh
	$area = "frontend";
	$controller = "home";
	$action = "index";
	//lay cac bien truyen tu url
	$area = isset($_GET["area"]) ? $_GET["area"] : $area;
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : $controller;
	$action = isset($_GET["action"]) ? $_GET["action"] : $action;
	//---
	//gan duong dan de thanh duong dan file controller
	$fileController = "controllers/$area/$controller"."Controller.php";
	//include duong dan file controller -> load MVC
	if(file_exists($fileController)){
		include $fileController;
		//ten class
		$className = $controller."Controller";
		if(class_exists($className)){
			//tao object cua class $fileController
			$obj = new $className();
			//goi ham trong class
			$obj->$action();
		}else{
			die("Class $className not exists!");
		}
	}
 ?>