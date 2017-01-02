<?php
/**
 * The Controller Class for SGLMVC
 *  
 * This class has the methods used to manipulate the view displayed for the different product categorires 
 * and to accept the updates, insertions, and deletions to the products in the showcase
 * 
 * Copyright 2014 - Steven Lamers - all rights reserved
 */



class Controller

{

	private $model;

/**
 * Controller class constructor
 *
 * All data views have an input form to enter a new product
 */

	public function __construct($model) {

		$this->model = $model;

		# all views of data grid have an new data entry form 
		$this->input_form = new ProductInputForm();
		$this->model->showcase_data_insert = " {$this->input_form->render()} ";
		
	}


/**
 * This is a method to display the tables category 
 *
 * 1) Sets the views title to show tables category
 * 2) Queries the database for tables to show in the showcase data view
 * 3) Renders the view
 */

	public function tables() {
	
		$this->model->showcase_title = "<H2> Table Showcase </H2>" ;

		$render_result = new DataBaseQuery( "SELECT * FROM products WHERE category=\"tables\"  " );

		$this->model->showcase_data = " {$render_result->render()} ";
		


	}

/**
 * This is a method to display the chairs category 
 *
 * 1) Sets the views title to show chairs category
 * 2) Queries the database for chairs to show in the showcase data view
 * 3) Renders the view
 */

	public function chairs() {
	
		$this->model->showcase_title 	= "<H2> Chairs Showcase <H2>" ;

		$render_result = new DataBaseQuery( "SELECT * FROM products WHERE category=\"chairs\"  " );

		$this->model->showcase_data = " {$render_result->render()} ";
		

	}

/**
 * This is a method to display the accessories category 
 *
 * 1) Sets the views title to show accessories category
 * 2) Queries the database for accessories to show in the showcase data view
 * 3) Renders the view
 */
	public function accessories() {
	
		$this->model->showcase_title 	= "<H2> Accessories Showcase <H2>" ;

		$render_result = new DataBaseQuery( "SELECT * FROM products WHERE category=\"accessories\"  " );

		$this->model->showcase_data = " {$render_result->render()} ";
		
	}
	

/**
 * This is a method to handle the update action events 
 *
 * Might be deprecated - or useful somhow ? ?
 */
	public function update() {

		# MIGHT BE DEPRECATED - REMOVE ? ?

		$category 	= $_POST['category'];

		$description 	= $_POST['description'];

		$price 		= $_POST['price'];

		$id 		= $_POST['id'];

		$this->model->showcase_title 	= " $category $description $price $id Showcase UPDATE" ;

		$this->model->showcase_data 	= " UPDATE THE TABLES DATA \n";
	}

/**
 * This is a method to handle the processing for update action events 
 *
 * 1) Expects to get data from the HTML form
 * 2) Performs an UPDATE to the database for all products
 */

	public function update_process() {

		$id 		= $_POST['id'];
		$category 	= $_POST['category'];
		$description 	= $_POST['description'];
		$price 		= $_POST['price'];
		$qty 		= $_POST['qty'];

		$dbq = new DataBaseQuery( "UPDATE products SET description=\"$description\", price=\"$price\", qty=
\"$qty\" WHERE id='$id' ");
		
		$dbq->update_db();
	}

/**
 * This is a method to handle the processing for update action events 
 *
 * 1) Expects to get data from the HTML form
 * 2) Performs an UPDATE to the database
 */

	public function insert_process() {

		$category 	= $_POST['category'];
		$description 	= $_POST['description'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];

		$dbq = new DataBaseQuery( "INSERT INTO products (category,description,price,qty) VALUES  (\"$category\", \"$description\", \"$price\", \"$qty\" ) ");
		
		$dbq->update_db();

	}

/**
 * This is a method to handle the processing for delete action events 
 *
 * 1) Expects to get data from the HTML form
 * 2) Performs a DELETE to the database
 */

	public function delete_process() {

		$id = $_POST['id'];

		$dbq = new DataBaseQuery( "DELETE FROM products WHERE id=$id"  );
		
		$dbq->update_db();

	}
}

/**
 * The New Product input form Class  - ProductInputForm
 *  
 * This class has the methods used to manipulate the HTML FORM view displayed
 * for the adding a new product to each of the different product categorires 
 * Also provides a method to render the input form
 * 1) The render method queires and expects rows of results
 * 2) the update_db method performs a query like, UPDATE or DELETE and does
 *    not expect any rows returned, just the action performed 
 */

class ProductInputForm

{
	private $input_form;
	
/**
 * This is a method to construct an HTML FORM to add a new product 
 * 
 */
	public function __construct() {

		$this->input_form = <<< EOT
<FORM ACTION=index.php?action=insert_process&category={$_GET['category']} METHOD=POST>
<INPUT TYPE=hidden name=category value={$_GET['category']}>
<TABLE BORDER=1>
<TR>
	<TD> Description <input type=text name=description></TD>
	<TD> Price <input type=text name=price></TD>
	<TD> Quantity <input type=text name=qty></TD>
	<TD> <INPUT type="submit" name="add_new" value="ADD NEW""> </TD> 
</TABLE>
</FORM>
EOT;

	}
	
/**
 * This is a method to render an input form
 * 
 * Returns the input view 
 */
	public function render() {

		return " {$this->input_form} ";

	}
}

/**
 * The Database connection and render methods Class  - DataBaseQuery 
 *  
 * This class has the methods used to perform update select and insert actions  
 * Also provides a method to render the data 
 */

class DataBaseQuery 

{

/**
 * DataBaseQuery class constructor method
 *
 * 1) Saves the query as private
 */

	private $query;
	
	public function __construct($query) {

		$this->query = $query;
	}

/**
 * DataBaseQuery class render method
 *
 * 1) Renders the HTML FORM data for the current query
 *    and returns the views content
 */
	public function render() {

		/* Connect to database */
		$mysqli = new mysqli("127.0.0.1", "jackstables", "", "jacks_tables" );

		/* We expect results! if not there is nothing */
		if ( $result = $mysqli->query( " {$this->query} " ) ) {

			$content = <<< EOT
<TABLE BORDER=1><TR><TH> ID </TH><TH> Description </TH><TH> Price </TH><TH> Quantity </TH><TH> Action </TH> </TR>
EOT;

			while ($row = $result->fetch_assoc()) {

		      		$content .= <<< EOT
<TR><FORM ACTION=index.php?action=update_process&category={$_GET['category']} METHOD=POST>
<INPUT type=hidden name=category value={$_GET['category']} >
<INPUT type=hidden name=id value={$row['id']} ><TD> {$row['id']} </TD>
<TD> <input type=text name=description value="{$row['description']}" </TD>
<TD> <input type=text name=price value={$row['price']} </TD>
<TD> <input type=text name=qty value={$row['qty']} </TD>
<TD> <INPUT type="submit" value="UPDATE" formaction="index.php?action=update_process&category={$_GET['category']}" > OR <INPUT type="submit" value="DELETE" formaction="index.php?action=delete_process&category={$_GET['category']}" > 
</FORM> </TD></TR>
EOT;
    			}

			$content .= "</TABLE> \n";

			/* free result set */
			$result->free();
		}
		
		/* close connection */
		$mysqli->close();

		/* Return the form content payload */
		return $content;

	}

/**
 * DataBaseQuery class update_db method
 *
 * 1) Performs the update, delete actions 
 * 2) Does not expect any rows returned
 */

	public function update_db () {

		/* Connect to the database */
		$mysqli = new mysqli("127.0.0.1", "jackstables", "", "jacks_tables" );

		/* Execute the SQL query */
		$mysqli->query( "{$this->query}" );

		/* determine number of rows in the result set */	
		$row_cnt = mysqli_affected_rows($mysqli);

		/* close connection */
		$mysqli->close();
	
		/* Return the rows affected as HTML */
		$content = " <P><H1> $row_cnt Updated </H1> ";

		return $content;

	}

}

?>
