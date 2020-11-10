<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["imagefile"]))
    {
        
        $errorMsg = '';
        $validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
        
        $name = $_FILES["imagefile"]['name']; 
        $type = $_FILES["imagefile"]['type'];

        if(!in_array($type, $validMimeTypes)) {
            $errorMsg = true;
            echo "Invalid file format";
        }

        if($_FILES["imagefile"]["size"] > 1000000) {
            $errorMsg = true;
            echo "maximum photo size allowed is 1MB";
        }

        $uploadFolder = "img/"; 

        if(!$errorMsg && is_dir($uploadFolder)) 
        {
            move_uploaded_file($_FILES['imagefile']['tmp_name'], $uploadFolder.$name);
            echo $uploadFolder.$name;
        }

    }
