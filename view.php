<?php
# Copyright 2014 - Steven Lamers - all rights reserved
#

class View

{

	private $model;

	private $controller;

	public function __construct($controller,$model) {

		$this->controller = $controller;

		$this->model = $model;

	}

	public function output() {

$output = <<<EOT
<BODY><HTML> 
<CENTER><H1>Jack's Table Emporium</H1></CENTER>

<CENTER><TABLE>
<TR>
<TD> <CENTER> <a href=index.php?category=tables>     <img src=images/220px-Tablebasicstructure.png> <H1> {$this->model->tables_title} </a></TD>
<TD> <CENTER> <a href=index.php?category=chairs>      <img src=images/250px-Vincent_Willem_van_Gogh_138.jpg> <H1> {$this->model->chairs_title} </a></TD>
<TD> <CENTER> <a href=index.php?category=accessories> <img src=images/120px-MS-SchnitzlackvaseFloral15Jh.jpg>  <H1> {$this->model->accessories_title} </a></TD>
</TR>
</TABLE></CENTER>

<CENTER><P> {$this->model->showcase_title}

<CENTER><P> {$this->model->showcase_data}

<p><a href=contact.php> Contact Us </a></p>

</HTML></BODY>
EOT;
 
		return $output;

	}
}
?>
