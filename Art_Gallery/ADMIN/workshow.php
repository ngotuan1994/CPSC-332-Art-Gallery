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
if($role=="Admin")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(../background.png);
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
<table width="100%" border="0" cellspacing="00" cellpadding="00">
  <tr bgcolor="#99CCFF">
  <th width="5%" scope="col"><a href="artist.php">Add Artist</a></th>
      <th width="5%" scope="col"><a href="customer.php">Add Customer</a></th>
      <th width="5%" scope="col"><a href="workart.php">Add WorkArt</a></th>
      <th width="5%" scope="col"><a href="workshow.php">Add WorkShow</a></th>
      <th width="5%" scope="col"><a href="at_search.php">Search Artist</a></th>
      <th width="6%" scope="col"><a href="cus_search.php">Search Customer </a></th>
      <th width="5%" scope="col"><a href="wa_search.php">Search Art Work</a></th>
      <th width="5%" scope="col"><a href="as_search.php">Search Art Show </a></th>
      <th width="5%" scope="col"><a href="print.php">Print database</a></th>
      <th width="5%" scope="col"><a href="report.php">Report</a></th>
      <th width="5%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
</table>
    <br/><br/>
    </p><form method="post" action="ws.php">
        <div style="background-color: beige; margin-left: 20%; alignment-adjust: central; width: 40%">
            <table align="center" width="100%" cellspacing="01" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Show ID&nbsp;:&nbsp;</font></td>
    <td><input type="text" size="20" id="in" name="show_id"/><font color="red" size="4">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Artist ID&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="artist_id"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Date and Time&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="dt"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Location&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="loc"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"> <font size="5">Contact &nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="contact"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Contact Phone &nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="contact_phone"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Title ID &nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="title_id"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Customer Potential  ID &nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="potential_id"/><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>

  
  
  
  <tr align="center" >
    <td>&nbsp;</td>
    <br/>
    <td colspan="2"><input type="submit"  name="add" value="Add" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
            </table> <br/><br/>  </div></form>
 <?php
}

  

?>
</table>
<p>
  <?php
}
?>
    
    

<p>&nbsp;</p>
