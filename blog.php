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
        
        <title>BlogFile - Blog</title>

    </head>
    <style>
        .form{
            margin-top: 10px;
            display: none;
        } 

        .form form input[type="submit"]{
            margin-bottom: 40px;
        } 

        .blogResultDiv{
            border: 1px solid black;
            border-radius: 2px;
            display: none;
        }
    </style>
    <body>

        <?php include 'partials/_dbconnect.php'; ?>
        <?php include 'partials/_navbar.php'; ?>

        <?php
            //restirict non login user 
        
            if(!isset($_SESSION['username']) || $_SESSION['username'] != true){
                echo '

                    <p style="color: red; text-align: center; font-weight: bold; font-size: 30px;">Pls login for Search and post a blog</p>
                
                ';
            } else {
                echo '
                
                    <div class="formForSearch">
                        <div class="container">
                            <form class="d-flex my-2 mx-2 w-100" action="blogSearch.php" method="get">
                                <input class="form-control me-2" type="search" autocomplete="off" name="search" placeholder="Search a blog" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" onclick="showTheResult()">Search</button>
                            </form>
                        </div>
                    </div>
                
                ';
            }
        
        ?>

        <?php 
        
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $heading = $_POST['heading'];
                $desc = $_POST['desc'];
                $mainArticle = $_POST['mainArticle'];

                //save the website from the XSS attack

                $headingEdited = str_replace('<script>', '&lt;script&gt;', $heading);
                $headingEdited = str_replace('<script type="text/javaScript">', '&lt;script&gt;', $headingEdited);
                $headingEdited = str_replace('</script>', '&lt;/script&gt;', $headingEdited);
                
                $descEdited = str_replace('<script>', '&lt;script&gt;', $desc);
                $descEdited = str_replace('<script type="text/javaScript">', '&lt;script&gt;', $descEdited);
                $descEdited = str_replace('</script>', '&lt;/script&gt;', $descEdited);

                $mainArticleEdited = str_replace('<script>', '&lt;script&gt;', $mainArticle);
                $mainArticleEdited = str_replace('<script type="text/javaScript">', '&lt;script&gt;', $mainArticleEdited);
                $mainArticleEdited = str_replace('</script>', '&lt;/script&gt;', $mainArticleEdited);

                //find the username of the email saved in the session
                $sqlSelectUser = "SELECT * FROM `user` WHERE `email`='$_SESSION[username]'";
                $resultSelect = mysqli_query($conn, $sqlSelectUser);

                while($username = mysqli_fetch_array($resultSelect)){
                    //get the username from the user table
                    $usernameAdd = $username['username'];
                    //save the blog in the database
                    $sql = "INSERT INTO `blog` (`head`, `smallDesc`, `mainArticle`, `submitBy`, `date`) VALUES ('$headingEdited', '$descEdited', '$mainArticleEdited', '$usernameAdd', current_timestamp())";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo "<p style='color: green; font-weight: bold;' class='text-center'>Your blog has been added";
                    } else {
                        echo "<p style='color: red; font-weight: bold;' class='text-center'>Your blog does not added</p>";
                    }
                }
            }
        
        ?>

        <div class="container">
            <?php

                //restirict non login user 

                if(!isset($_SESSION['username']) || $_SESSION['username'] != true){
                    echo ' ';
                } else {
                    echo '

                        <div class="buttonForTheAddBlog" style="margin: 5px 0px 6px 1%;">
                            <button onclick="showForm()" class="btn btn-primary">Make a blog</button>
                        </div>
                    
                    ';
                }
            
            ?>
            <div class="form">
                <form action="blog.php" method="post">
                    <label for="heading" class="form-label">Heading Of the Blog</label><br>
                    <input type="text" name="heading" aria-describedby="emailHelp" class="form-control" autocomplete="off" id="heading" class="userInputs"><br>

                    <label for="description">Small Description Of the Blog</label><br>
                    <textarea name="desc" id="description" aria-describedby="emailHelp" class="form-control" autocomplete="off" cols="30" rows="10" class="userInputs"></textarea><br>

                    <label for="mainDesc">Main Article</label><br>
                    <textarea name="mainArticle" aria-describedby="emailHelp" class="form-control" autocomplete="off"  id="mainDesc" cols="30" rows="10" class="userInputs"></textarea><br>
                    <input type="submit">
                </form>
            </div>
            <div class="blog">
                <div class="container">
                    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                        <div class="col-md-6 px-0">
                            <h1 class="display-4 font-italic">My first blog</h1>
                            <p class="lead my-3">This is my first blog and this is my second hosted website. So I hope you like this.</p>
                        </div>
                    </div>
                </div>
                
                <?php 
                    $isExisted = false;
                    // select all the blog from the database
                    $sqlFetchBlog = "SELECT * FROM `blog` ORDER BY `Srno` DESC";
                    $resultFetchBlog = mysqli_query($conn, $sqlFetchBlog);

                    while($fetchedBlogs = mysqli_fetch_array($resultFetchBlog)){
                        $isExisted = true;

                        echo '
        
                            <main class="container">
                                <div class="row">
                                    <div class="col-md-8">
            
                                        <div class="blog-post">
                                            <h2 class="blog-post-title">' . $fetchedBlogs['head'] . '</h2>
                                            <p class="blog-post-meta">' . $fetchedBlogs['date'] . ' by <strong>' . $fetchedBlogs['submitBy'] . '</strong></p>
            
                                            <p>' . $fetchedBlogs['smallDesc'] . '</p>
                                            <hr>
                                            <p>' . $fetchedBlogs['mainArticle'] . '</p>
                                            
                                        </div>
            
                                    
                                    </div>
            
                                </div>
            
                            </main>

                            <hr>
                            
                        ';
                    }

                    if(!$isExisted){
                        echo '

                            <p>
                                No blog fetched.
                            </p>
                        
                        ';
                    }
                
                ?>

            </div>

        </div>

        <?php include 'partials/_footer.php'; ?>


        <!-- javaScript -->
        <script src="js/blog.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>