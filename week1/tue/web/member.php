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
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
        *:focus {
            outline: none;
        }

        body {
            margin: 0;
            padding: 0;
            background: #DDD;
            font-size: 16px;
            color: #222;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
        }

        #login-box {
            position: relative;
            margin: 5% auto;
            width: 600px;
            height: 400px;
            background: #FFF;
            border-radius: 2px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .left {
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            padding: 40px;
            width: 350px;
            height: 400px;
        }

        h1 {
            margin: 0 0 20px 0;
            font-weight: 300;
            font-size: 28px;
        }

        input[type="text"]{
            display: block;
            box-sizing: border-box;
            margin-bottom: 20px;
            padding: 4px;
            width: 220px;
            height: 32px;
            border: none;
            border-bottom: 1px solid #AAA;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 15px;
            transition: 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-bottom: 2px solid #16a085;
            color: #16a085;
            transition: 0.2s ease;
        }

        input[type="submit"] {
            margin-top: 28px;
            width: 120px;
            height: 32px;
            background: #16a085;
            border: none;
            border-radius: 2px;
            color: #FFF;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            text-transform: uppercase;
            transition: 0.1s ease;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="submit"]:focus {
            opacity: 0.8;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            transition: 0.1s ease;
        }

        input[type="submit"]:active {
            opacity: 1;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
            transition: 0.1s ease;
        }

        .or {
            position: absolute;
            top: 140px;
            left: 300px;
            width: 40px;
            height: 40px;
            background: #DDD;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            line-height: 40px;
            text-align: center;
        }

        .right {
            position: absolute;
            top: 0;
            right: 0;
            box-sizing: border-box;
            padding: 40px;
            width: 250px;
            height: 400px;
            background: url('https://goo.gl/YbktSj');
            background-size: cover;
            background-position: center;
            border-radius: 0 2px 2px 0;
        }

        .right .loginwith {
            display: block;
            margin-bottom: 40px;
            font-size: 28px;
            color: #FFF;
            text-align: center;
        }

        button.social-signin {
            margin-top: auto;
            margin-bottom: 20px;
            width: 200px;
            height: 36px;
            border: none;
            border-radius: 2px;
            color: #FFF;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            transition: 0.2s ease;
            cursor: pointer;
        }

        button.social-signin:hover,
        button.social-signin:focus {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            transition: 0.2s ease;
        }

        button.social-signin:active {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
            transition: 0.2s ease;
        }

        button.social-signin.facebook {
            position: relative;
            top: 80px;
            background: #32508E;
        }
    </style>
</head>
<body>
    <header>
        <h1></h1>
    </header>
    <main>
        <div id="login-box">
            <form action="" method="post">
                <div class="left">
                    <h1>Membership Form</h1>
                    
                    <input type="text" name="firstname" placeholder="First Name *" />
                    <input type="text" name="lastname" placeholder="Last Name *" />
                    
                    <input type="submit" value="Add Member"/>
                </div>
                
                <div class="right">
                    <button class="social-signin facebook">View Members</button>
                </div>
                <div class="or">OR</div>
            </form>
        </div>
    </main>
</body>
</html>