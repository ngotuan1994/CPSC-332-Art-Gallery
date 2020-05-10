<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(background.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
               
	}
</style>
<title>Art Gallery</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="#D2691E">
    <th width="74" scope="col">&nbsp;</th>
    <th width="646" scope="col"><font size="8" color="White">Art Gallery</font></th>
    <th width="140" scope="col"><font color="White" size="5">
	<?php
    print $role;
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#99CCFF">
  <th width="5%" scope="col"><a href="ADMIN/artist.php">Add Artist</a></th>
      <th width="5%" scope="col"><a href="ADMIN/customer.php">Add Customer</a></th>
      <th width="5%" scope="col"><a href="ADMIN/workart.php">Add WorkArt</a></th>
      <th width="5%" scope="col"><a href="ADMIN/workshow.php">Add WorkShow</a></th>
      <th width="5%" scope="col"><a href="ADMIN/at_search.php">Search Artist</a></th>
      <th width="6%" scope="col"><a href="ADMIN/cus_search.php">Search Customer </a></th>
      <th width="5%" scope="col"><a href="ADMIN/wa_search.php">Search Art Work</a></th>
      <th width="5%" scope="col"><a href="ADMIN/as_search.php">Search Art Show </a></th>
      <th width="5%" scope="col"><a href="ADMIN/print.php">Print database</a></th>
      <th width="5%" scope="col"><a href="ADMIN/report.php">Report</a></th>


      <th width="5%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
    
        
    
</table>
   
 <?php
}


?>
</table>
<p>
  <?php

?>
    
    
</p>
<p>&nbsp;</p>
  </table>
</table></body>