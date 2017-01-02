<?php
/**
 * The main index.php for SGLMVC with ADMIN PLUS(tm)
 *
 * Copyright 2014 - Steven Lamers - all rights reserved
 */

require_once 'model.php';
require_once 'view.php';
require_once 'controller.php';


$model = new Model();

$controller = new Controller($model);

$view = new View($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action'])) {

# Invoke the controller object's method to handle any database update action
	$controller->{$_GET['action']}();	
	error_log("DEBUG Action Request {$_GET['action']}", 0);

}

if (isset($_GET['category']) && !empty($_GET['category'])) {

# Invoke the controller object's method to create a table and render in HTML the inventory for a category

	$controller->{$_GET['category']}();
	error_log("DEBUG category {$_GET['category']} displayed", 0);

}

echo $view->output();

?>
