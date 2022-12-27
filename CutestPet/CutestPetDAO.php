<?php
    addPicture();
    //function to add the picture to the database
    function addPicture() {
        //get the poster's name
        $pname = $_POST['pname'];
        //get the pet description
        $pdesc = $_POST['pdesc'];
        //get the file type
        $ftype = $_FILES["pfile"]["type"];
        //get the file name
        $fname = $_FILES["pfile"]["name"];
        //get the file size
        $size = $_FILES["pfile"]["size"]; 
        if ("1" <= $size && $size <= "250000"){
            //get all the data
            $fdata = fread(fopen($_FILES['pfile']['tmp_name'], "rb"),
            $_FILES['pfile']['size']);
            $fdata = base64_encode($fdata);
            include "../include/config.php";
            //insert the data into the database
            $sql = "INSERT INTO `pictures` (OwnerName,PetDesc,PFileType,PFileName,PFileData)".
            " values ".
            "(\"${pname}\",\"${pdesc}\",\"${ftype}\",\"${fname}\",\"${fdata}\")";
            //let the user know if it has worked or not
            if(mysqli_query($connection, $sql)) {
                echo '<script type="text/javascript">';
                echo ' alert("Photo uploaded")';
                echo '</script>';
            } else {
                echo mysqli_error($connection);
                return;
            }
            mysqli_close($connection); 
        }elseif ($size == "0"){
            //If the size is 0 there is an error with the file let user know
            echo '<script type="text/javascript">';
            echo 'alert("Error with file please try another picture")';
            echo '</script>';

        }else{
            //Let user know if there file is too big
            echo '<script type="text/javascript">';
            echo ' alert("File size too big")';
            echo '</script>';
        }
    }
    //when process is complete go back to previous user page
   echo '<script type="text/JavaScript"> window.location.href="./CutestPet.php"; </script>';
?>