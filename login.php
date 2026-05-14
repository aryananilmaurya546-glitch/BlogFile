<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="noindex" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/blogFile.png" type="image/x-icon">
        
        <title>BlogFile - Login</title>

    </head>
    <body>
        <?php include 'partials/_dbconnect.php'; ?>

        <?php

            $error = "Email doesn't exist!";
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $sqlLogin = "SELECT * FROM `user` WHERE `email` = '$email';";
                $result = mysqli_query($conn, $sqlLogin);
                $num = mysqli_num_rows($result);

                if($num == 1){
                    while($row = mysqli_fetch_assoc($result)){
                        if(password_verify($pass, $row['password'])){
                            $login = true;
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $email;
                            header("location: index.php?success=true");
                            exit();
                        } else {
                            $error = "Password does not match";
                        }
                    }
                } 
                header("Location: index.php?loginfail=true&error=$error");
            }
        
        ?>
        
        <div class="container" style="margin-top: 50px;">
            <form action="login.php" method="post">
                <label for="loginEmailId" class="form-label">Email address</label>
                <input type="text" autocomplete="off" class="form-control" id="loginEmailId" aria-describedby="emailHelp" name="email">
                <label for="loginPassId" class="form-label">Password</label>
                <input type="password" autocomplete="off" class="form-control" id="loginPassId" aria-describedby="emailHelp" name="pass">
                <input type="submit" class="btn btn-primary my-2">
            </form>
        </div>

        <!-- javaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>