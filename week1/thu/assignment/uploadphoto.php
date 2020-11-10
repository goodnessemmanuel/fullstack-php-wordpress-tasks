<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["imagefile"]))
    {
        
        $errorMsg = '';
        $validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
        
        //var_dump($_FILES["imagefile"]);
        
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

        // Get Image Dimension
        $fileinfo = @getimagesize($_FILES["imagefile"]["tmp_name"]);
        $width = $fileinfo[0];
        $height = $fileinfo[1];

        if(width < 800 || height < 600){
            $errorMsg = true;
            echo "photo dimension must be atleast 800(width) by 600(height)";

        }

        $uploadFolder = "img/"; 

        if(!$errorMsg && is_dir($uploadFolder)) 
        {
            move_uploaded_file($_FILES['imagefile']['tmp_name'], $uploadFolder.$name);
            echo $uploadFolder.$name;
        }

    }
