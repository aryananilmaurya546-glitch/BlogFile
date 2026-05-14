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
                $isExisted = false;
                // select all the blog from the database
                $query = $_GET['search'];

                echo "<h1 style='text-align: center;'>No result found - '" . $query . "' </h1>";

                $sqlFetchBlog = "SELECT * FROM `blog` WHERE MATCH (`head`, `smallDesc`, `submitBy`) against ('$query');";
                $resultFetchBlog = mysqli_query($conn, $sqlFetchBlog);

                while($fetchedBlogs = mysqli_fetch_array($resultFetchBlog)){
                    $isExisted = true;

                    echo '

                        <h1 style="text-align: center;">Related Search "' . $query . '" </h1><br>
    
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

                        <p style="color: red; text-align: center;">No result found</p>

                    
                    ';
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