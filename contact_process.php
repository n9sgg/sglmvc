<?php
# Copyright 2014 - Steven Lamers - all rights reserved
#

$message = "Email from Jacks Table Emporium \n";

if (isset($_GET['user']) && !empty($_GET['user'])) {

	$message .= "User name was {$_GET['user']} \n" ;
}
else
{
	echo "<p> User name was missing - Use your browser to go back please." ;	
	exit();

}

if (isset($_GET['email']) && !empty($_GET['email'])) {

	$message .= "Email address was {$_GET['email']} \n" ;
}
else
{
	echo "<p> Email address was missing - Use your browser to go back please" ;	
	exit();

}

if (isset($_GET['message']) && !empty($_GET['message'])) {

	$message .= "Message was {$_GET['message']} \n" ;
}
else
{
	echo "<p> Message was missing - Use your browser to go back please" ;	
	exit();

}

mail('n9sgg@localhost', 'Jacks Table Emporium Contact Email', $message);


	echo "<P> Thank you for contacting Jacks Table Emporium. We will get back to you soon! ";
	echo "<P> <A HREF=index.php> Back to HOME </A> ";

?>
