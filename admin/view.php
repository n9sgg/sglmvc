<?php
/**
 * The View Class for SGLMVC
 *
 * This class has the methods used to display view for the different product categorires
 *
 * Copyright 2014 - Steven Lamers - all rights reserved
 */

class View

{

	private $model;

	private $controller;

	public function __construct($controller,$model) {

		$this->controller = $controller;

		$this->model = $model;

	}

/**
 * The View Class output method
 *
 * This method is used to create the HTML for the display view 
 * for the different product categorires
 * This is the main page template - move the content around here
 *
 */
	public function output() {

$output = <<<EOT
<BODY><HTML> 
<CENTER><H1>Jack's Table Emporium - ADMIN PAGE </H1></CENTER>

<CENTER><TABLE>
<TR>
<TD> <CENTER> <a href=index.php?category=tables>     <img src=../images/220px-Tablebasicstructure.png> <H1> {$this->model->tables_title} </a></TD>
<TD> <CENTER> <a href=index.php?category=chairs>      <img src=../images/250px-Vincent_Willem_van_Gogh_138.jpg> <H1> {$this->model->chairs_title} </a></TD>
<TD> <CENTER> <a href=index.php?category=accessories> <img src=../images/120px-MS-SchnitzlackvaseFloral15Jh.jpg>  <H1> {$this->model->accessories_title} </a></TD>
</TR>
</TABLE></CENTER>

<CENTER><P> {$this->model->showcase_title}

<CENTER><P> {$this->model->showcase_data}

<CENTER><P> {$this->model->showcase_data_insert}


<p><a href=index.php> Home Page </a></p>

</HTML></BODY>
EOT;
 
		return $output;

	}
}
?>
