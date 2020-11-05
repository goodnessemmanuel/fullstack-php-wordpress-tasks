<?php
    if(isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
        
        //sanitize user input against invalid data
        $firstname = htmlspecialchars(strip_tags(stripcslashes(trim($_POST["firstname"]))));
        $lastname = htmlspecialchars(strip_tags(stripcslashes(trim($_POST["lastname"]))));

        if(empty($firstname) || empty($lastname))
        {
            echo "<span>please enter a valid input</span>";
        }
        else
        {

            $postData = ["firstname" => $firstname, "lastname" => $lastname];

            $fileName = "database.json";

            if(!file_exists($fileName)){
                echo "file source error";
                exit;
            }

            //get the current json file as string
            $currentData = file_get_contents($fileName);

            //decode current json data as associative array @true
            $currentDataArray = json_decode($currentData, true);

            if(is_null($currentDataArray)){
                $currentDataArray = [];
            }

            array_unshift($currentDataArray, $postData); 

            $currentDataJSON = json_encode($currentDataArray);

            //make sure the file exists and is writable first.
            if(is_writable($fileName)) {

                //open file in overwriting (i.e 'w') mode
                $openFile = fopen($fileName, 'w'); 

                if(!$openFile) {
                    echo "Cannot open file ($fileName)";
                    exit;
                }

                //Write $currentDataJSON to the opened file.
                $writeToFile = fwrite($openFile, $currentDataJSON);

                if ($writeToFile === FALSE) {
                    echo "Cannot write to file ($fileName)";
                    exit;
                }

                fclose($openFile);

                echo "<p>Member added successfully</p>";
                echo file_get_contents($fileName);

            } 
            else 
            {
                echo "cannot write to file source";
            }

        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>

    <style>
    
    </style>
</head>
<body>
    <header>
        <h1>Membership form</h1>
    </header>
    <main>
        <form method="post">
            <label for="firstname">First Name: </label>
            <input name="firstname" type="text" id="firstname"/>
            <br>
            <label for="lastname">Last Name: </label>
            <input name="lastname" type="text" id="lastname"/>
            <br>

            <button>Submit</button>
        </form>

    </main>
</body>
</html>