<?php
    include 'connection.php';
        if(isset($_POST['add']))
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
              
            $sql= "INSERT INTO `Art_Gallery`.`ARTWORK` (`Artist_ID`, `Title_ID`, `Location`, `Price`, `TypeofArt`, `DateofCreation`,`Title`,`DateAcquirred`) VALUES ('$atid', '$tid', '$loc', '$price',  '$type', '$date','$title','$acquirred');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:workart.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:workart.php');
        }       
                  
        }
 
?>
    
