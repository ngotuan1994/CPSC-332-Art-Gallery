<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include './connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['cusid']; 

           $phone=$_POST['cusphone'];
           $artpre=$_POST['cusartpre'];
           $favo_id=$_POST['cus_fa_at_id']; 
           $name=$_POST['cus_name'];
           
           if (!empty($id)||!empty($phone)||!empty($artpre)||!empty($favo_id)||!empty($name))
           {
              
            $sql= "UPDATE `Art_Gallery`.`CUSTOMER` SET `Cus_ID` = '$id',  `phone` = '$phone', `ArtPreferences_ID` = '$artpre', `Favorite_artist_ID` = '$favo_id', `Cus_name`='$name' WHERE `CUSTOMER`.`Cus_ID` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:cus_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:cus_search.php');
        }  
}

if(isset($_POST['delete']))
{
           $id=$_POST['cusid']; 

           $phone=$_POST['cusphone'];
           $artpre=$_POST['cusartpre'];
           $favo_id=$_POST['cus_fa_at_id']; 
           $name=$_POST['cus_name'];
           
           if (!empty($id)|| !empty($name)||!empty($phone)||!empty($artpre)||!empty($favo_id))
           {
              
            $sql= " DELETE FROM `Art_Gallery`.`CUSTOMER` where `Cus_ID`= '$id' ;";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:cus_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:cus_search.php');
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
    <br/><br/><br/>
    <form method="post" action="cus_search.php">
      
       <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
           <table align="center"  width="100%" cellspacing="00" cellpadding="05">
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Customer ID&nbsp;:&nbsp; </font>    </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select Cus_ID from CUSTOMER";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px;">
                 <option >Customer</option>
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['Cus_ID'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
             
             </select></td>
  </tr>
               <tr>
                   <td colspan="3" align="center"><input id="bt" type="submit" name="search" value="Search" />
    </td>
    <td>&nbsp;</td>
  </tr>
       </table>
       </div> 
       <br/><br/>
       <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 35%">
       <table align="center"  width="100%" cellspacing="00" cellpadding="05">
       <?php
       if (isset($_POST['search']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from CUSTOMER where Cus_ID ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       
       <tr>
    <td>&nbsp;</td>
    <td align="left"><font size="4">Customer ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cusid" value="<?php echo $row['Cus_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
       
       

  <tr>
    <td>&nbsp;</td>
    <td align="left"><font size="4">Phone&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cusphone" value="<?php echo $row['Phone'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><font size="4">Art Preferences ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cusartpre" value="<?php echo $row['ArtPreferences_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><font size="4">Favorite Artist ID &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cus_fa_at_id" value="<?php echo $row['Favorite_Artist_ID'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><font size="4">Customer Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="cus_name" value="<?php echo $row['Cus_name'];?>"/></td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="update" value="Update" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2">
        <input type="submit" name="delete" value="Delete" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
</table>
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
      


