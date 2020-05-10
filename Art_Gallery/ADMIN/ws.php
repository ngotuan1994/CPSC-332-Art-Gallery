<?php
    include 'connection.php';
        if(isset($_POST['add']))
        {
           $sid=$_POST['show_id']; 
           $atid=$_POST['artist_id'];
           $datetime=$_POST['dt'];
           $loc=$_POST['loc'];
           $contact=$_POST['contact']; 
           $contact_phone=$_POST['contact_phone'];
           $title_id=$_POST['title_id'];
           $cus_potential_id=$_POST['potential_id'];

           
           
          if (!empty($sid)|| !empty($atid)||!empty($datetime)||!empty($loc)||!empty($contact)||!empty($contact_phone)||!empty($title_id)||!empty($Cus_potential_id))
           {
              
            $sql= "INSERT INTO `Art_Gallery`.`ARTSHOW` (`Show_ID`, `Artist_ID`, `DateandTime`, `Location`, `Contact`, `ContactPhone`,`Title_ID`,`Cus_Potential_ID`) VALUES ('$sid', '$atid', '$datetime', '$loc',  '$contact', '$contact_phone', '$title_id', '$cus_potential_id');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:workshow.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:workshow.php');
        }       
                  
        }
 
?>
    
