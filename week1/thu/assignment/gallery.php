<?php

    $directory = "img/";
    $errorEncounter =  false;
    $imageFiles = [];

    if(is_dir($directory))
    {
        $files =  scandir($directory);

        if(!$files)
        {
            $errorEncounter = true;
        }

        if(!$errorEncounter)
        {
            $file_exts = [".jpg", ".png", ".gif",  ".jpeg"];

            foreach ($files as $file) 
            {
                if($file === '.' || $file === '..') { continue; }

                $file = strtolower($file);

                foreach ($file_exts as $file_ext) 
                {
                    if(endsWith($file, $file_ext))
                    {
                        array_push($imageFiles, $file);
                        break;
                    }
                }
            }

        }

    }
    
    function endsWith($haystack, $needle) : bool{
        return strpos($haystack, $needle,  -strlen($needle)) !== false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iGallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="bucket">
        <div class='header'>
            <h1>iGallery</h1>
            <p>A simple way to share your photo</p>
        </div>

        <div class="form-area">
            <div>
                <div class="form-response"></div>
                <h2>Upload new photo</h2>
                <form id="uploadForm" action="uploadphoto.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="imagefile" id="imagefile">
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>

        <div class="gallery-area">

            <?php if(empty($imageFiles)): ?>
            <h1>Your photo album is empty, click browse to upload new photo</h1>

            <?php elseif($errorEncounter): ?>
            <h1>An Error occurred while trying to access photo gallery</h1> 

            <?php else: ?>   
            <h1>Latest Photo</h1>
            <div id="gallery">
                <?php foreach ($imageFiles as $key => $imageFile): ?> 
                    <div class="gallery-item">
                        <img src="<?php echo "img/$imageFile"; ?>" alt="">
                    </div>     
                <? endforeach; ?>
            </div>   
            <? endif; ?>
        </div>
    </div>

    <div class="modal-background">
        <div class="modal-content">
            <img src="img/nelson-mandela.jpg" alt="" >
            <button class="close-modal">X</button>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
            //function close modal dialog when close button is clicked
            $(".close-modal").on("click", function(){
                $(".modal-background").removeClass("show-modal");
            });

            //function open image in a modal dialog
            $(".gallery-item > img").on("click", function() {
                 let $thisSrc = $(this).attr("src");

                 $(".modal-content > img").attr('src', $thisSrc); 
                 
                 $(".modal-background").addClass("show-modal");

            });

            $("#uploadForm").on('submit', (function(e){
                e.preventDefault();
                $.ajax({
                    url: "uploadphoto.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                    $(".form-response").html(data);
                    let imgDiv = $('<div/>'); //Equivalent: $(document.createElement('img'))
                    imgDiv.attr('class', "gallery-item");
                    let img = $('<img>'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', data);
                    img.appendTo(imgDiv);
                    imgDiv.appendTo("div#gallery");
                },
                error: function(data){
                    $(".form-response").html(data);
                } 	        
                });
            }));
        });
        
    </script>
</body>
</html>