<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <!-- favicon -->
        <link rel="shortcut icon" href="images/blogFile.png" type="image/x-icon">

        <title>BlogFile - Index</title>

    </head>
    <style>
        .buttonsForTheNavigation{
            width: 20%;
            height: 40px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.5s;
        }
        .buttonsForTheNavigation a{
            text-decoration: none;
            color: black;
        }
        .buttonsForTheNavigation:hover{
            background-color: rgb(21, 224, 21);
            transform: translateY(10px);
        }
    </style>
    <body>
        <?php include 'partials/_dbconnect.php'; ?>
        
        <?php include 'partials/_navbar.php'; ?>

        <div class="container" style="height: 52vh; text-align: center; margin-top: 14%;">
            <div class="information">
                <h1>BlogFile</h1>
                <p>
                    Here, you will get blog about the developer of this BlogFile website and All the project file
                </p>
            </div>
            <div class="buttons">
                <a href="blog.php"><button class="buttonsForTheNavigation btn btn-primary">Blog</button></a>
                <a href="fileUpload.php"><button class="buttonsForTheNavigation btn btn-danger">Files</button></a>
            </div>
        </div>

        <?php include 'partials/_footer.php'; ?>


        <!-- javaScript -->
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>