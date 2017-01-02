<?php
# Copyright 2014 - Steven Lamers - all rights reserved
#

class Controller

{

	private $model;
	
	public function __construct($model) {

		$this->model = $model;

	}

	public function tables() {
	
		$this->model->showcase_title = "<H2> Table Showcase </H2>" ;

		$mysqli = new mysqli("127.0.0.1", "jackstables", "", "jacks_tables" );

		if ( $result = $mysqli->query("SELECT * FROM products WHERE category=\"tables\"  ") ) {

			$content = "<TABLE BORDER=1><TR><TH> ID </TH><TH> Description </TH><TH> Price </TH></TR> ";
		
			while ($row = $result->fetch_assoc()) {

		      		$content .= "<TR><TD> {$row['id']} </TD><TD> {$row['description']} </TD><TD> &#36 {$row['price']} </TD></TR>" ;
    			}

			$content .= "</TABLE BORDER> ";

			/* free result set */
			$result->free();

		}

		$this->model->showcase_data = " {$content} ";
		
		/* close connection */
		$mysqli->close();
	}

	
	public function chairs() {
	
		$this->model->showcase_title 	= "<H2> Chairs Showcase </H2>" ;

		$mysqli = new mysqli("127.0.0.1", "jackstables", "", "jacks_tables" );

		if ( $result = $mysqli->query("SELECT * FROM products WHERE category=\"chairs\"  ") ) {

			$content = "<TABLE BORDER=1><TR><TH> ID </TH><TH> Description </TH><TH> Price </TH></TR> ";
		
			while ($row = $result->fetch_assoc()) {

		      		$content .= "<TR><TD> {$row['id']} </TD><TD> {$row['description']} </TD><TD>  &#36 {$row['price']} </TD></TR>" ;
    			}

			$content .= "</TABLE BORDER> ";

			/* free result set */
			$result->free();

		}

		$this->model->showcase_data = " {$content} ";
		
		/* close connection */
		$mysqli->close();
	
	}

	public function accessories() {
	
		$this->model->showcase_title 	= " <H2> Accessories Showcase </H2> " ;

		$mysqli = new mysqli("127.0.0.1", "jackstables", "", "jacks_tables" );

		if ( $result = $mysqli->query("SELECT * FROM products WHERE category=\"accessories\"  ") ) {

			$content = "<TABLE BORDER=1><TR><TH> ID </TH><TH> Description </TH><TH> Price </TH></TR> ";
		
			while ($row = $result->fetch_assoc()) {

		      		$content .= "<TR><TD> {$row['id']} </TD><TD> {$row['description']} </TD><TD> &#36 {$row['price']} </TD></TR>" ;
    			}

			$content .= "</TABLE BORDER> ";

			/* free result set */
			$result->free();

		}

		$this->model->showcase_data = " {$content} ";
		
		/* close connection */
		$mysqli->close();
	
	}
	

}

?>
