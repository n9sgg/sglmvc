<?php
# Copyright 2014 - Steven Lamers - all rights reserved
#

$content = <<< EOT

<CENTER><H1>JACK'S TABLE EMPORIUM Contact Us Form</H1></CENTER>

<FORM ACTION=contact_process.php>

<P>Username: <input type="text" name="user">

<P>Email: <input type="text" name="email">

<P>Message: 
<P>
   <TEXTAREA name="message" rows="20" cols="80">
   Your Message Here Please
   </TEXTAREA>

<P> <input type="submit" name="Submit">

</FORM>

EOT;

echo $content;

?>
