
<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['atid']; 
           $fn=$_POST['atfn'];
           $ln=$_POST['atln'];
           $phone=$_POST['atphone'];
           $age=$_POST['atage']; 
           $address=$_POST['ataddress'];
           $place=$_POST['atplace'];
           $style=$_POST['atstyle'];
           $show=$_POST['atshow'];
           
           if (!empty($id)|| !empty($fn)||!empty($ln)||!empty($phone)||!empty($age)||!empty($address)|| !empty($place) || !empty($style)|| !empty($show))
           {
              
            $sql= "UPDATE `Art_Gallery`.`ARTIST` SET `Artist_ID` = '$id', `Fname` = '$fn', `Lname` = '$ln', `Phone` = '$phone', `Age` = '$age', `Address` = '$address' , `Birth_Place`= '$place', `StyleofArt_ID`='$style' ,`ArtShow_ID`='$show' WHERE `ARTIST`.`Artist_ID` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:at_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:at_search.php');
        }  
}

if(isset($_POST['delete']))
{
           $id=$_POST['atid']; 
           $fn=$_POST['atfn'];
           $ln=$_POST['atln'];
           $phone=$_POST['atphone'];
           $age=$_POST['atage']; 
           $address=$_POST['ataddress'];
           $place=$_POST['atplace'];
           $style=$_POST['atstyle'];
           $show=$_POST['atshow'];
           
           if (!empty($id)|| !empty($fn)||!empty($ln)||!empty($phone)||!empty($age)||!empty($address)|| !empty($place) || !empty($style)|| !empty($show))
           {
              
            $sql= "DELETE FROM `Art_Gallery`.`ARTIST` where `Artist_ID`='$id' ; ";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:at_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:at_search.php');
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
    
    <form method="post" action="at_search.php">
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
    <td align="right"><font size="5">Artist ID&nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select Artist_ID from ARTIST;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Artist</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['Artist_ID'];
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
                    $sql1="select * from ARTIST where Artist_ID ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Artist ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atid" value="<?php echo $row['Artist_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">First Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atfn" value="<?php echo $row['Fname'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Last Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atln" value="<?php echo $row['Lname'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Phone&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atphone" value="<?php echo $row['Phone'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Age &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="atage" value="<?php echo $row['Age'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Address&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="ataddress" value="<?php echo $row['Address'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Birth Place&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="atplace" value="<?php echo $row['Birth_place'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Style of Art ID&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="atstyle" value="<?php echo $row['StyleofArt_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Art Show ID&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="atshow" value="<?php echo $row['ArtShow_ID'];?>"/></td>
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
  



