
<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];






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

  




  
  <form method="post" action="report.php">
      <div>
   <table width="100%"  cellspacing="05" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
   </table>
          <div style="background-color: beige; margin-left: 33%; alignment-adjust: central; width: 50%">
              <table align="center" width="100%" cellspacing="00" cellpadding="05" >
  <tr>
    <h1>Artist Table
    <td>&nbsp;</td>
    <td align="right"><font size="5">Field &nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
            
            
             
             $sql="Show columns from ARTIST;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="fd" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Field Name</option>
                 <?php
                 while($row = mysqli_fetch_row($result))
                 {
                     $category= $row[0];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
                
     ?>
            </select> 
            <select name="option" style ="width: 10em; hieght: 2em; font_size: 15px;">
            <option value="ASC"> ASC</option>
            <option value="DESC"> DESC</option>
            </select>
        <td colspan="3" align="center">
            <input type="submit" name="pick_at" value="Pick" id="bt" />
    </td>
    <td>&nbsp;</td>
    </tr>
  </table>
  </form>
  
<?php
  
  if(isset($_POST['pick_at'])){
   
    $fd=$_POST['fd'];
    $ud=$_POST['option'];
$sql= "Select * from ARTIST order by $fd $ud;";
if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Artist ID</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>First Name</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Last Name</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Phone</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Age</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Address</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Birth Place</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Style of Art ID</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Art Show ID</th>";
            echo "</tr>";
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Artist_ID'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Fname'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Lname'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Phone'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Age'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Address'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Birth_place'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['StyleofArt_ID'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['ArtShow_ID'] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found";
    }
} else{
    echo "Error:Could not able to execute $sql.".mysqli_error($conn);
}
$conn->close();
}
?>



  
 







  
  
  
  
<form method="post" action="report.php">
      <div>
   <table width="100%"  cellspacing="00" cellpadding="00">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
   </table>
          <div style="background-color: beige; margin-left: 0%; alignment-adjust: left; width: 100%">
              <table align="left" width="100%" cellspacing="00" cellpadding="05" >
  <tr>
    <h1>Customer Table
    <td>&nbsp;</td>
    <td align="right"><font size="5">Field &nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
            
            
             
             $sql="Show columns from CUSTOMER;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="fd" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Field Name</option>
                 <?php
                 while($row = mysqli_fetch_row($result))
                 {
                     $category= $row[0];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
                
     ?>
            </select> 
            <select name="option" style ="width: 10em; hieght: 2em; font_size: 15px;">
            <option value="ASC"> ASC</option>
            <option value="DESC"> DESC</option>
            </select>
        <td colspan="3" align="center">
            <input type="submit" name="pick_fd" value="Pick" id="bt" />
    </td>
    <td>&nbsp;</td>
    </tr>
  </table>
  </form>
  
<?php
  
  if(isset($_POST['pick_fd'])){
   
    $fd=$_POST['fd'];
    $ud=$_POST['option'];
$sql= "Select * from CUSTOMER order by $fd $ud;";
if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Customer ID</th>";
                echo "<th>Phone</th>";
                echo "<th>Art Preferences";
                echo "<th>Favorite Artist ID";
                echo "<th>Customer Name";
            echo "</tr>";
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Cus_ID'] ."</td>";
                echo "<td>" . $row['Phone'] ."</td>";
                echo "<td>" . $row['ArtPreferences_ID'] ."</td>";
                echo "<td>" . $row['Favorite_Artist_ID'] ."</td>";
                echo "<td>" . $row['Cus_name'] ."</td>";

            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found";
    }
} else{
    echo "Error:Could not able to execute $sql.".mysqli_error($conn);
}
$conn->close();
}
?>



  





<form method="post" action="report.php">
      
   <table width="100%"  cellspacing="05" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
   </table>
          <div style="background-color: beige; margin-left: 0%; alignment-adjust: central; width: 100%">
              <table align="center" width="100%" cellspacing="00" cellpadding="05" >
  <tr>
    <h1>ArtWork Table
    <td>&nbsp;</td>
    <td align="right"><font size="5">Field &nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
            
            
             
             $sql="Show columns from ARTWORK;";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="fd" style="width: 10em; height: 2em; font-size: 15px; ">
                 <option selected="selected" >Field Name</option>
                 <?php
                 while($row = mysqli_fetch_row($result))
                 {
                     $category= $row[0];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
                
     ?>
            </select> 
            <select name="option" style ="width: 10em; hieght: 2em; font_size: 15px;">
            <option value="ASC"> ASC</option>
            <option value="DESC"> DESC</option>
            </select>
        <td colspan="3" align="center">
            <input type="submit" name="pick_aw" value="Pick" id="bt" />
    </td>
    <td>&nbsp;</td>
    </tr>
  </table>
  </form>
  
<?php
  
  if(isset($_POST['pick_aw'])){
   
    $fd=$_POST['fd'];
    $ud=$_POST['option'];
$sql= "Select * from ARTWORK order by $fd $ud;";
if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Artist ID</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Title ID</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Location</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Price</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Type of Art</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Date of Creation</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Title</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>Date Acquirred</th>";
            echo "</tr>";
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Artist_ID'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Title_ID'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Location'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Price'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['TypeofArt'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['DateofCreation'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['Title'] ."</td>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<td>" . $row['DateAcquirred'] ."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found";
    }
} else{
    echo "Error:Could not able to execute $sql.".mysqli_error($conn);
}
$conn->close();
}
?>
  
  


  <form method="post" action="report.php">
      
      <table width="100%"  cellspacing="05" cellpadding="05">
     <tr>
       <th width="7%" scope="col">&nbsp;</th>
       <th width="43%" scope="col">&nbsp;</th>
       <th width="44%" scope="col">&nbsp;</th>
       <th width="6%" scope="col">&nbsp;</th>
     </tr>
      </table>
             <div style="background-color: beige; margin-left: 0%; alignment-adjust: central; width: 100%">
                 <table align="center" width="100%" cellspacing="00" cellpadding="05" >
     <tr>
       <h1>ArtShow Table
       <td>&nbsp;</td>
       <td align="right"><font size="5">Field &nbsp;:&nbsp;</font> </td>
       <td>
           <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from ARTSHOW;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="fd" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" >Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
               </select> 
               <select name="option" style ="width: 10em; hieght: 2em; font_size: 15px;">
               <option value="ASC"> ASC</option>
               <option value="DESC"> DESC</option>
               </select>
           <td colspan="3" align="center">
               <input type="submit" name="pick_as" value="Pick" id="bt" />
       </td>
       <td>&nbsp;</td>
       </tr>
     </table>
     </form>
     
   <?php
     
     if(isset($_POST['pick_as'])){
      
       $fd=$_POST['fd'];
       $ud=$_POST['option'];
   $sql= "Select * from ARTSHOW order by $fd $ud;";
   if($result = mysqli_query($conn,$sql)){
       if(mysqli_num_rows($result)>0){
           echo "<table>";
               echo "<tr>";
                   echo "<th>Show ID</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Artist ID</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Date and Time</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Location</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Contact</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Contact Phone</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Title ID</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Customer Potential ID</th>";

               echo "</tr>";
           while ($row = mysqli_fetch_array($result)){
               echo "<tr>";
                   echo "<td>" . $row['Show_ID'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Artist_ID'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['DateandTime'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Location'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Contact'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['ContactPhone'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Title_ID'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Cus_Potential_ID'] ."</td>";
               echo "</tr>";
           }
           echo "</table>";
           mysqli_free_result($result);
       } else{
           echo "No records matching your query were found";
       }
   } else{
       echo "Error:Could not able to execute $sql.".mysqli_error($conn);
   }
   $conn->close();
   }
   ?>
     

     <form method="post" action="report.php">
      
      <table width="100%"  cellspacing="05" cellpadding="05">
     <tr>
       <th width="7%" scope="col">&nbsp;</th>
       <th width="43%" scope="col">&nbsp;</th>
       <th width="44%" scope="col">&nbsp;</th>
       <th width="6%" scope="col">&nbsp;</th>
     </tr>
      </table>
             <div style="background-color: beige; margin-left: 0%; alignment-adjust: central; width: 100%">
                 <table align="center" width="100%" cellspacing="00" cellpadding="05" >
     <tr>
       <h1>Art Style Table
       <td>&nbsp;</td>
       <td align="right"><font size="5">Field &nbsp;:&nbsp;</font> </td>
       <td>
           <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from ARTSTYLE;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="fd" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" >Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
               </select> 
               <select name="option" style ="width: 10em; hieght: 2em; font_size: 15px;">
               <option value="ASC"> ASC</option>
               <option value="DESC"> DESC</option>
               </select>
           <td colspan="3" align="center">
               <input type="submit" name="pick_artstyle" value="Pick" id="bt" />
       </td>
       <td>&nbsp;</td>
       </tr>
     </table>
     </form>
     
   <?php
     
     if(isset($_POST['pick_artstyle'])){
      
       $fd=$_POST['fd'];
       $ud=$_POST['option'];
   $sql= "Select * from ARTSTYLE order by $fd $ud;";
   if($result = mysqli_query($conn,$sql)){
       if(mysqli_num_rows($result)>0){
           echo "<table>";
               echo "<tr>";
                   echo "<th>Art Style ID</th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<th>Style </th>";
                   echo "<th>" ?> &nbsp; <?php "</th>";

               echo "</tr>";
           while ($row = mysqli_fetch_array($result)){
               echo "<tr>";
                   echo "<td>" . $row['Style_ID'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
                   echo "<td>" . $row['Style'] ."</td>";
                   echo "<th>" ?> &nbsp; <?php "</th>";
               echo "</tr>";
           }
           echo "</table>";
           mysqli_free_result($result);
       } else{
           echo "No records matching your query were found";
       }
   } else{
       echo "Error:Could not able to execute $sql.".mysqli_error($conn);
   }
   $conn->close();
   }
   ?>
   



  
  
     <form method="post" action="report.php">
      
      <table width="100%"  cellspacing="05" cellpadding="05">
     <tr>
       <th width="7%" scope="col">&nbsp;</th>
       <th width="43%" scope="col">&nbsp;</th>
       <th width="44%" scope="col">&nbsp;</th>
       <th width="6%" scope="col">&nbsp;</th>
     </tr>
      </table>
             <div style="background-color: beige; margin-left: 0%; alignment-adjust: central; width: 100%">
                 <table align="center" width="100%" cellspacing="00" cellpadding="05" >
     <tr>
       <h1>Custom Table
       <td>&nbsp;</td>
       <td align="right"><font size="5">Artist Attributes &nbsp;:&nbsp;</font> </td>
       <td>
           <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from ARTIST;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="tb_fd1" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" value="">Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
               <td>&nbsp;</td>
       <td align="right"><font size="5">Customer Attributes &nbsp;:&nbsp;</font> </td>
       <td>
            <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from CUSTOMER;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="tb_fd2" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" value="">Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
               <td>&nbsp;</td>
       <td align="right"><font size="5">Art Show Attributes &nbsp;:&nbsp;</font> </td>
       <td>
        <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from ARTSHOW;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="tb_fd3" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" value="">Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
               <td>&nbsp;</td>
       <td align="right"><font size="5">Art Work Attributes &nbsp;:&nbsp;</font> </td>
       <td>
        <?php
               include '../connection.php';
               
               
                
                $sql="Show columns from ARTWORK;";
                $result=  mysqli_query($conn, $sql)
                ?> <select name="tb_fd4" style="width: 10em; height: 2em; font-size: 15px; ">
                    <option selected="selected" value="">Field Name</option>
                    <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        $category= $row[0];
                        ?>
                    <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                    <?php
                    }
                   
        ?>
        
            
        <td colspan="3" align="center">
               <input type="submit" name="custom" value="Pick" id="bt" />
       </td>
       <td>&nbsp;</td>
       </tr>
     </table>
     </form>

<?php
    if(isset($_POST['custom'])){
        $table1=$_POST['tb_fd1'];
        $table2=$_POST['tb_fd2'];
        $table3=$_POST['tb_fd3'];
        $table4=$_POST['tb_fd4'];
        
        if($table1 != "" )
        $sql = " select $table1 from ARTIST ;";
        if($table2 != "" )
        $sql = " select $table2 from CUSTOMER ;";
        if($table3 != "" )
        $sql = " select $table3 from ARTSHOW ;";
        if($table4 != "" )
        $sql = " select $table4 from ARTWORK ;";
        if($table1 != "" && $table2 !="")
        $sql= "Select at.$table1, cu.$table2 from ARTIST at inner join CUSTOMER as cu on at.Artist_ID=cu.Favorite_Artist_ID; ";
        if ($table1 != "" && $table2 !="" && $table3 !="")
        $sql= "Select at.$table1, cu.$table2 , ass.$table3 from ARTIST at inner join CUSTOMER as cu on at.Artist_ID=cu.Favorite_Artist_ID inner join ARTSHOW as ass on cu.Favorite_Artist_ID=ass.Artist_ID;";
        if($table1 != "" && $table2 !="" && $table3 !="" && $table4!="") 
        $sql= "Select at.$table1, cu.$table2 , ass.$table3 , aw.$table4 from ARTIST at inner join CUSTOMER as cu on at.Artist_ID=cu.Favorite_Artist_ID inner join ARTSHOW as ass on cu.Favorite_Artist_ID=ass.Artist_ID inner join ARTWORK as aw on ass.Artist_ID=aw.Artist_ID;";
        if($table1 != "" && $table2 !="" && $table3 !="" && $table4!="" ) 
        $sql= "Select at.$table1, cu.$table2 , ass.$table3 , aw.$table4     from ARTIST at inner join CUSTOMER as cu on at.Artist_ID=cu.Favorite_Artist_ID inner join ARTSHOW as ass on cu.Favorite_Artist_ID=ass.Artist_ID inner join ARTWORK as aw on ass.Artist_ID=aw.Artist_ID;";
        if($result = mysqli_query($conn,$sql)){
            
            if(mysqli_num_rows($result)>0){
                echo "<table>";
                if($table1!=""){
                echo "<th> $table1</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";}
                if($table2!=""){
                echo "<th> $table2</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";}
                if($table3!=""){
                echo "<th> $table3</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";}
                if($table4!=""){
                echo "<th> $table4</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "</tr>";}
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    if($table1!=""){
                    echo "<td>" . $row[$table1] ."</td>";
                    echo "<th>" ?> &nbsp; <?php "</th>";}
                    if($table2!=""){
                    echo "<td>" . $row[$table2] ."</td>";
                    echo "<th>" ?> &nbsp; <?php "</th>";}
                    if($table3!=""){
                    echo "<td>" . $row[$table3] ."</td>";
                    echo "<th>" ?> &nbsp; <?php "</th>";}
                    if($table4!=""){
                    echo "<td>" . $row[$table4] ."</td>";
                    echo "<th>" ?> &nbsp; <?php "</th>";}
                    echo "</tr>";
           }
           echo "</table>";
           mysqli_free_result($result);
       } else{
           echo "No records matching your query were found";
       }
   } else{
       echo "Error:Could not able to execute $sql.".mysqli_error($conn);
   }
   $conn->close();
   }
   ?>



