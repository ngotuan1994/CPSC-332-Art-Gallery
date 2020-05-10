<?php
    include 'connection.php';
        if(isset($_POST['add']))
        {
            $id=$_POST['cusid']; 
            $phone=$_POST['cusphone'];
            $artpre=$_POST['cusartpre'];
            $favo_id=$_POST['cus_fa_at_id']; 
            $cus_name=$_POST['cus_name'];
           
           
            if (!empty($id)|| !empty($num)||!empty($phone)||!empty($artpre)||!empty($favo_id) ||!empty($cus_name))
           {
              
            $sql= "INSERT INTO `Art_Gallery`.`CUSTOMER` (`Cus_ID`,  `Phone`, `ArtPreferences_ID`, `Favorite_Artist_ID`,`Cus_name`) VALUES ('$id', '$phone', '$artpre', '$favo_id','$cus_name');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:customer.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:customer.php');
        }       
                  
        }
 
?>
    
