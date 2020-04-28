<?php

include 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    //check if data with the id exist in the database

    $sql = 'SELECT `id` FROM `users` WHERE `id` = "'.$_GET['id'].'"';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $delete_query = 'DELETE FROM `users` WHERE `id` = "'.$_GET['id'].'"';

        $success = $conn->query($delete_query);
        
        if ($success) {
        	$message = "deleted successfully";
        	header("location:view.php?message".$message);
        }else{
        	echo "fail to delete data";
        }


    }else{

    	echo "id is invalid";
    }






}




?>