<?php
$target_dir = "image_uploads/";
$target_files = array();
for ($i = 0; $i < count($_FILES["userfile"]["name"]); $i++) {
    $uploadOk = 1;

    $target_file = $target_dir . basename($_FILES["userfile"]["name"][$i]);
    if (file_exists($target_file)) {
        echo "Sorry, file already exists: " . $target_file;
        $uploadOk = 0;
    }
    if ($_FILES["userfile"]["size"][$i] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["userfile"]["tmp_name"][$i], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["userfile"]["name"][$i])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


?>