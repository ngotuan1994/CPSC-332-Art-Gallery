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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <br/><br/><br/>
    <?php
    // Artist table
    ?>
        <h1>Artist Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Artist ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Artist First Name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Artist Last Name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Phone"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Age"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Address"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Birth place"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Style of Art ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Art Show ID"."</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from Artist ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['Artist_ID']."<td/>";
                            echo "<td>".$std['Fname']."<td/>"; 
                            echo "<td>".$std['Lname']."<td/>"; 
                            echo "<td>".$std['Phone']."<td/>"; 
                            echo "<td>".$std['Age']."<td/>"; 
                            echo "<td>".$std['Address']."<td/>"; 
                            echo "<td>".$std['Birth_place']."<td/>"; 
                            echo "<td>".$std['StyleofArt_ID']."<td/>";
                            echo "<td>".$std['ArtShow_ID']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
        <?php
        // Customer table
        ?>
        <h1>Customer Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Customer ID"."</th>";

                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Phone"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Art Preferences ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Favorite Artist ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Customer Name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from Customer ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['Cus_ID']."<td/>";
                            
                            echo "<td>".$std['Phone']."<td/>"; 
                            echo "<td>".$std['ArtPreferences_ID']."<td/>"; 
                            echo "<td>".$std['Favorite_Artist_ID']."<td/>"; 
                            echo "<td>".$std['Cus_name']."<td/>";
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
   
    <?php
    // ArtWork table
    ?>
    <h1>ArtWork Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Artist ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Tittle ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Location"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Price"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Type of Art"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date of Creation"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Title"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date Acquirred"."</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from ArtWork ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['Artist_ID']."<td/>";
                            echo "<td>".$std['Title_ID']."<td/>"; 
                            echo "<td>".$std['Location']."<td/>"; 
                            echo "<td>".$std['Price']."<td/>"; 
                            echo "<td>".$std['TypeofArt']."<td/>"; 
                            echo "<td>".$std['DateofCreation']."<td/>"; 
                            echo "<td>".$std['Title']."<td/>"; 
                            echo "<td>".$std['DateAcquirred']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
    <?php
    // ArtShow table
    ?>
    <h1>ArtShow Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Show ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Artist ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date and Time "."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Location"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Contact"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Contact Phone"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Title ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Customer Potential ID"."</th>";
                echo "</tr>";
                include './connection.php';
                        $sql1="select * from ArtShow ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['Show_ID']."<td/>";
                            echo "<td>".$std['Artist_ID']."<td/>"; 
                            echo "<td>".$std['DateandTime']."<td/>"; 
                            echo "<td>".$std['Location']."<td/>"; 
                            echo "<td>".$std['Contact']."<td/>"; 
                            echo "<td>".$std['ContactPhone']."<td/>"; 
                            echo "<td>".$std['Title_ID']."<td/>"; 
                            echo "<td>".$std['Cus_Potential_ID']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
        <?php
    // ArtShow table
    ?>
    <h1>Art Style Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Style ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Style "."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";

                echo "</tr>";
                include './connection.php';
                        $sql1="select * from ARTSTYLE ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['Style_ID']."<td/>";
                            echo "<td>".$std['Style']."<td/>"; 

                            ?>  </tr> <?php 
                        }
            ?>
        </table>
        <h1>Admin  Table
        </h1>
        <table  border="1" align="center" bgcolor="red">
            <?php
                echo "<tr>";
                echo "<th>"."Admin ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Admin Password "."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";

                echo "</tr>";
                include './connection.php';
                        $sql1="select * from admin ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['ID']."<td/>";
                            echo "<td>".$std['password']."<td/>"; 

                            ?>  </tr> <?php 
                        }
            ?>
        </table>
        <br/><br/><br/>
    </form>
 <?php
 
}
}
   