<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/blogFile.png" type="image/x-icon">

        <title>BlogFile - Search Blog</title>

    </head>
    <body>

        <?php include 'partials/_dbconnect.php'; ?>
        <?php include 'partials/_navbar.php'; ?>

        <div class="container">

            <?php
                $existed = false;

                //get the parameter value
                $query = $_GET['searchFile'];

                echo "<h1 style='text-align: center;'>Related Result - '" . $query . "'</h1>";

                //select the result by parameter value
                $sqlForSearchFile = "SELECT * FROM `file` WHERE MATCH (`head`, `description`) against ('$query')";
                $resultFetched = mysqli_query($conn, $sqlForSearchFile);

                //fetch the result and show it in a html
                while($resultFetchRow = mysqli_fetch_array($resultFetched)){
                    $existed = true;

                    echo '

                        <h1>' . $resultFetchRow['head'] . '</h1>
                        <p>' . $resultFetchRow['description'] . '</p>
                        <a href="upload/default' . $resultFetchRow['Srno'] . '.zip" download>Download</a>
                        <a href="partials/_deleteFileHandle.php?srno=' . $resultFetchRow['Srno'] . '">Delete</a>
                        <p>Date of Upload:- ' . $resultFetchRow['dateOfUpload'] . '</p>
                    ';

                    if($resultFetchRow['dateOfUpdateReUpload'] === '0000-00-00'){
                        echo '

                            <p>Date of Update or ReUpload:- This file is not reUploaded or Updated By the Owner yet.</p>
                        
                        ';
                    } else {
                        echo '

                            <p>Date of Update or ReUpload:- ' . $resultFetchRow['dateOfUpdateReUpload'] . '</p>

                        ';
                    }

                    echo "<hr>";
                }

                if(!$existed){
                    echo '<p style="color: red; text-align: center;">No result found</p>';
                }

            ?>

        </div>

        <?php include 'partials/_footer.php'; ?>


        <!-- javaScript -->
        <script src="js/blog.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>