<?php
    session_start();
    //include "../../globalFiles/config.php"; // include the database configuration file
    $upload_folder = "../animalImages/"; //define file path for images to be inserted into

    //assign form data to variables
    $userID = $_SESSION['email'];
    $dateReg = date('Y-m-d H:i:s');
    $imgID = 1;
    
    //insert form data into db
    $sql1 = "INSERT INTO `tbl_animal_images`".
        "values". 
        "('$userID', '', '$dateReg', '')";

    if(!mysqli_query($connection, $sql1)) {
        echo 'False 1';
        echo mysqli_error($connection);
    }
        
    $insertedAnimalID = mysqli_insert_id($connection);

    //name and relocate image file to upload folder
    foreach($_FILES["images"]["name"] as $key => $file_name) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $ext = end((explode(".", $file_name)));
        $imgID = $insertedAnimalID . "_" . $key . "." . $ext; //final name of image file

        //insert name into db with corresponding animalID
        $sql2 = "INSERT INTO tbl_animal_images (animalID, imgID) VALUES
            ('$insertedAnimalID', '$imgID')";
        if(!mysqli_query($connection, $sql2)) {
            echo 'False 2';
        } else {
            echo "<script language='javascript'>";
            echo 'alert("success");';
            echo "</script>";
        }
        move_uploaded_file($tmp_name, $upload_folder.$imgID); 
    }
    echo 'True';
    mysqli_close($connection);
?>