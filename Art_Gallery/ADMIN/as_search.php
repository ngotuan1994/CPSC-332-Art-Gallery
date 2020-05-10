
<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
  $sid=$_POST['sid']; 
  $atid=$_POST['atid'];
  $datetime=$_POST['dt'];
  $loc=$_POST['loc'];
  $contact=$_POST['ct']; 
  $contact_phone=$_POST['ctp'];
  $title_id=$_POST['tid'];
  $cus_potential_id=$_POST['pid'];
           
  if (!empty($sid)|| !empty($atid)||!empty($datetime)||!empty($loc)||!empty($contact)||!empty($contact_phone)||!empty($title_id)||!empty($Cus_potential_id))
  {
              
            $sql= "UPDATE `Art_Gallery`.`ARTSHOW` SET `Show_ID`='$sid' ,`Artist_ID` = '$atid', `DateandTime` = '$datetime', `Location` = '$loc', `Contact` = '$contact', `ContactPhone` = '$contact_phone', `Title_ID` = '$title_id' , `Cus_Potential_ID`= '$cus_potential_id' WHERE `ARTSHOW`.`Show_ID` = '$sid';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:as_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:as_search.php');
        }  
}

if(isset($_POST['delete']))
{
  $sid=$_POST['sid']; 
  $atid=$_POST['atid'];
  $datetime=$_POST['dt'];
  $loc=$_POST['loc'];
  $contact=$_POST['ct']; 
  $contact_phone=$_POST['ctp'];
  $title_id=$_POST['tid'];
  $cus_potential_id=$_POST['pid'];
           
  if (!empty($sid)|| !empty($atid)||!empty($datetime)||!empty($loc)||!empty($contact)||!empty($contact_phone)||!empty($title_id)||!empty($Cus_potential_id))
  {
              
            $sql= "DELETE FROM `Art_Gallery`.`ARTSHOW` where `Show_ID`='$sid' ; ";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:as_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:as_search.php');
        }  
}







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
<table width="100%" border="0" cellspacing="01" cellpadding="01">
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
    
    <form method="post" action="as_search.php">
      <div>
   <table width="100%"  cellspacing="05" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
   </table>
          <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
              <table align="center" width="100%" cellspacing="00" cellpadding="05" >
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Show ID&nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select Show_ID from ARTSHOW;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Show ID</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['Show_ID'];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select> 
    </td>
  </tr>
    <tr>
        <td colspan="3" align="center">
            <input type="submit" name="search" value="Search" id="bt" />
    </td>
    <td>&nbsp;</td>
  </tr>
          </table>
          </div>
          <br/><br/>
          <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
              <br/>
          <table align="center"  width="100%" cellspacing="00" cellpadding="03">
       <?php
       if (isset($_POST['search']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from ARTSHOW where Show_ID ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Show ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="sid" value="<?php echo $row['Show_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Artist ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atid" value="<?php echo $row['Artist_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Date and Time &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="dt" value="<?php echo $row['DateandTime'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Location&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="loc" value="<?php echo $row['Location'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Contact&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="ct" value="<?php echo $row['Contact'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Contact Phone&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="ctp" value="<?php echo $row['ContactPhone'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Title ID&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="tid" value="<?php echo $row['Title_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Customer Potential ID&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="pid" value="<?php echo $row['Cus_Potential_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  
  
  
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="update" value="Update" id="bt"/>
            
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="delete" value="Delete" id="bt"/>
            
    <td>&nbsp;</td>
  </tr>
</table><br/>
      </div>
  </form>
 <?php
}

else   
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
<?php
}
?>
</table>
<?php
}
?>
  



