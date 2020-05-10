<?php
    include 'connection.php';
        if(isset($_POST['add']))
        {
           $id=$_POST['id']; 
           $fn=$_POST['fn'];
           $ln=$_POST['ln'];
           $phone=$_POST['phone'];
           $age=$_POST['age']; 
           $address=$_POST['address'];
           $place=$_POST['place'];
           $style=$_POST['style'];
           $show=$_POST['show'];
           
           
          if (!empty($id)|| !empty($fn)||!empty($ln)||!empty($phone)||!empty($address)||!empty($age)|| !empty($place)|| !empty($style) || !empty($show) )
           {
              
            $sql= "INSERT INTO `Art_Gallery`.`ARTIST` (`Artist_ID`, `Fname`, `Lname`, `Phone`, `Age`, `Address`, `Birth_Place`,`StyleofArt_ID`,`ArtShow_ID`) VALUES ('$id', '$fn', '$ln', '$phone',  '$age', '$address','$place','$style','$show');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:artist.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:artist.php');
        }       
                  
        }
 
?>
    
