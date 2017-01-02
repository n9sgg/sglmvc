<?php
# Copyright 2014 - Steven Lamers - all rights reserved
#

require_once 'model.php';
require_once 'view.php';
require_once 'controller.php';


$model = new Model();

$controller = new Controller($model);

$view = new View($controller, $model);


if (isset($_GET['category']) && !empty($_GET['category'])) {

	$controller->{$_GET['category']}();

}

echo $view->output();

?>
