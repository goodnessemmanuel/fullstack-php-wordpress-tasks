<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["imagefile"]))
    {

        $validMimeTypes = ['image/png', 'image/jpeg', 'img/jpg', 'image/gif'];
        //string  to upload a file
        $name = $_FILES["imagefile"]['name']; 
        $type = $_FILES["imagefile"]['type'];
            
        $errorMsg = '';

        if(!in_array($type, $validMimeTypes)) {
            $errorMsg = "Invalid file format";
            echo "<span>$errorMsg</span>";
        }

        $uploadFolder = "./img"; 

        if(!$errorMsg && is_dir($uploadFolder)) 
        {
            // good to upload
            move_uploaded_file($_FILES['imagefile']['tmp_name'], "$uploadFolder/$name");
            echo "img/$name";
        }

    }
