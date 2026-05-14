<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/fileUpload.css">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/blogFile.png" type="image/x-icon">
        
        <title>BlogFile - File Uplaod</title>

    </head>
    <body>

        <script>
            function showTheForm(){
                document.querySelector('.formForTheFile').style.display = 'block';
                document.querySelector('.uploadTheFile').style.display = 'none';
                $("#showTheFiles").addClass("hideIt");
            }
        </script>
        <?php include 'partials/_dbconnect.php'; ?>
        
        <?php include 'partials/_navbar.php'; ?>

        <?php
            //restirict non login user 
            if(!isset($_SESSION['username']) || $_SESSION['username'] != true){
                echo '

                    <p style="color: red; text-align: center; font-weight: bold; font-size: 30px;">Pls login for upload and view the file</p>
                
                ';
                exit();
            }
        
        ?>

        <div class="container uploadTheFile">
            <div class="formForSearch" id="formForSearchId">
                <form class="d-flex my-2 mx-2 w-100" action='fileSearch.php' method='get'>
                    <input class="form-control me-2" type="search" autocomplete="off" name="searchFile" placeholder="Search a File" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            
            <div class="container">
                <p class="buttonForTheUploaFile" style="margin: 5px 0px 6px 0%;">
                    <button onclick="showTheForm()" class='btn btn-primary'>Upload an File</button>
                </p>
            </div>
        </div>


        <?php

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $head = $_POST['head'];
                $desc = $_POST['desc'];
                $version = $_POST['version'];
                $dateOfUpload = $_POST['date'];
                $dateOfUpdate = $_POST['updatingDate'];
                $file = $_FILES['files'];

                // variable that needed to upload the file
                $nameFile = $_FILES['files']['name'];
                $typeFile = $_FILES['files']['type'];
                $tmpFile = $_FILES['files']['tmp_name'];
                $errorFile = $_FILES['files']['error'];
                $sizeFile = $_FILES['files']['size'];

                //validation stage of file
                if(!empty($head) || !empty($desc) || !empty($version)){
                    $fileExt = explode('.', $nameFile);
                    $fileActualExt = strtolower(end($fileExt));
                    //allowed extension
                    $allowed = array('zip');
                    //check is the extension is suitable to our credential
                    if(in_array($fileActualExt, $allowed)){
                        // check if there any error
                        if($errorFile === 0){
                            // check if the size is ok or not
                            if($sizeFile < 8000000){

                                //save the website from the xss attack
                                $headingEdit = str_replace('<', '&lt;', $head);
                                $headingEdit = str_replace('>', '&gt;', $headingEdit);
                                
                                $descEdit = str_replace('<', '&lt;', $desc);
                                $descEdit = str_replace('>', '&gt;', $descEdit);

                                $sqlToAddInformation = "INSERT INTO `file` (`head`, `description`, `fileVersion`, `dateOfUpload`, `dateOfUpdateReUpload`) VALUES ('$headingEdit', '$descEdit', '$version', '$dateOfUpload', '$dateOfUpdate')";
                                $insertData = mysqli_query($conn, $sqlToAddInformation);

                                //select the data that is same to the head
                                $sqlToFetchData = "SELECT * FROM `file` WHERE `head`='$head'";
                                $fetchResult = mysqli_query($conn, $sqlToFetchData);

                                // fetching the srno from the databse to set it as file name
                                while($fetched = mysqli_fetch_array($fetchResult)){
                                    $fileNameNew = "default" . $fetched['Srno'] . "." . $fileActualExt;
                                    $fileDestination = "upload/" . $fileNameNew;
                                    
                                    //move the file from the temporary destination to actual destination
                                    move_uploaded_file($tmpFile, $fileDestination);
                                    //show an message when the file is uploaded
                                    echo "<p style='font-size: 30px; font-weight: bold; color: green; text-align: center;'>Your file has been uploaded</p>";
                                }

                            } else {
                                echo '<p class="text-center" style="font-weight: bold; color: red;">Your file should be less than 8mb</p>';
                            }
                        } else {
                            echo '<p class="text-center" style="font-weight: bold; color: red;">There is an error while uploading the file</p>';
                        }
                    } else {
                        echo '<p class="text-center" style="font-weight: bold; color: red;">This file type doesn\'t support pls use zip</p>';
                    }
                } else {
                    echo '<p class="text-center" style="font-weight: bold; color: red;">Please fill the text box</p>';
                }
            }
        
        ?>

        <div class="container my-2 formForTheFile" style="display: none;">
            <form action="fileUpload.php" method="post" enctype="multipart/form-data">

                <p style='color: red; font-weight: bold;'>Notice:- Please be patince while uploading the file it will take a minute</p>

                <label for="head">Heading</label>
                <input type="text" class="form-control" autocomplete="off" aria-describedby="emailHelp" name="head" id="head"><br>

                <label for="desc">Description</label>
                <textarea name="desc" class="form-control" aria-describedby="emailHelp" id="desc" cols="30" rows="10"></textarea><br>

                <label for="version">File Version</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="version" id="version" autocomplete='off'>
                <small>Do not set V before the version name v1.0.0 -> 1.0.0</small><br><br>

                <label for="date">Date of Uploading</label>
                <input type="date" class="form-control" aria-describedby="emailHelp" name="date" id="date">
                <small>Set that date when this file was uploaded for the first time</small><br><br>

                <label for="updatingDate">Updating Date</label>
                <input type="date" class="form-control" aria-describedby="emailHelp" name="updatingDate" id="updatingDate">
                <small>If you are reuploading the file or updating the file so you want to set this todays date</small>
                <br><br>

                <input type="file" class="form-control" aria-describedby="emailHelp" name="files" id="files"><br>
                <input type="submit">
            </form>
        </div>
        <div class="container my-3" id='showTheFiles'>
            <?php 
            
                $sqlFetchResult = "SELECT * FROM `file` ORDER BY `Srno` DESC";
                $resultFetch = mysqli_query($conn, $sqlFetchResult);

                while($resultFetchRow = mysqli_fetch_array($resultFetch)){
                    echo '

                        <div style="overflow-x: scroll;">
                            <h1>' . $resultFetchRow['head'] . '</h1>
                            <p>' . $resultFetchRow['description'] . '</p>
                            <a href="upload/default' . $resultFetchRow['Srno'] . '.zip" download>Download</a>
                            <a href="partials/_deleteFileHandle.php?srno=' . $resultFetchRow['Srno'] . '">Delete</a>
                            <p>File Version:- v' . $resultFetchRow['fileVersion'] . '</p>
                            <p>Date of Upload:- ' . $resultFetchRow['dateOfUpload'] . '</p>
                    ';

                    if($resultFetchRow['dateOfUpdateReUpload'] === '0000-00-00'){
                        echo '

                                <p>Date of Update or ReUpload:- This file is not reUploaded or Updated By the Owner yet.</p>
                            </div>
                        ';
                    } else {
                        echo '

                                <p>Date of Update or ReUpload:- ' . $resultFetchRow['dateOfUpdateReUpload'] . '</p>
                            </div>
                        ';
                    }

                    echo "<hr>";
                }
            
            ?>
        </div>

        <?php include 'partials/_footer.php'; ?>


        <!-- javaScript -->
        <script src="js/fileUpload.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>