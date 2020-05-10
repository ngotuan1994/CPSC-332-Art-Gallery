
<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
  $atid=$_POST['artist_id']; 
  $tid=$_POST['title_id'];
  $loc=$_POST['location'];
  $price=$_POST['price'];
  $type=$_POST['type']; 
  $date=$_POST['date'];
  $title=$_POST['title'];
  $acquirred=$_POST['acquirred'];
           
           if (!empty($atid)|| !empty($tid)||!empty($loc)||!empty($price)||!empty($type)||!empty($date)|| !empty($title)|| !empty($acquirred) )
           {
              
            $sql= "UPDATE `Art_Gallery`.`ARTWORK` SET `Artist_ID` = '$atid', `Title_ID` = '$tid', `Location` = '$loc', `Price` = '$price', `TypeofArt` = '$type', `DateofCreation` = '$date' , `Title`= '$title', `DateAcquirred`='$acquirred'  WHERE `ARTWORK`.`Title_ID` = '$tid';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:wa_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:wa_search.php');
        }  
}

if(isset($_POST['delete']))
{
  $atid=$_POST['artist_id']; 
  $tid=$_POST['title_id'];
  $loc=$_POST['location'];
  $price=$_POST['price'];
  $type=$_POST['type']; 
  $date=$_POST['date'];
  $title=$_POST['title'];
  $acquirred=$_POST['acquirred'];
           
  if (!empty($atid)|| !empty($tid)||!empty($loc)||!empty($price)||!empty($type)||!empty($date)|| !empty($title)|| !empty($acquirred) )
  {
              
            $sql= "DELETE FROM `Art_Gallery`.`ARTWORK` where `Title_ID`='$tid' ; ";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:wa_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:wa_search.php');
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
    
    <form method="post" action="wa_search.php">
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
    <td align="right"><font size="5">Title ID&nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select Title_ID from ARTWORK;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Title ID</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['Title_ID'];
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
                    $sql1="select * from ARTWORK where Title_ID ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Artist ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="artist_id" value="<?php echo $row['Artist_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Title ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="title_id" value="<?php echo $row['Title_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Location &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="location" value="<?php echo $row['Location'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Price&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="price" value="<?php echo $row['Price'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Type of Art &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="type" value="<?php echo $row['TypeofArt'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Date of Creation&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="date" value="<?php echo $row['DateofCreation'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Title&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="title" value="<?php echo $row['Title'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Date Acquirred&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="acquirred" value="<?php echo $row['DateAcquirred'];?>"/></td>
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
  



