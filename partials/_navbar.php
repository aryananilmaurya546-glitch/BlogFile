<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">BlogFile</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="fileUpload.php">File</a>
        </li>
        <li class="nav-item">
          <a href="howBlogWrite.php" class="nav-link active" aria-current="page">How To Use Blog</a>
        </li>
      </ul>
      <?php
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
          echo '
          
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
            </ul>
          
          ';
        } else {

          echo '
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
              </li>
            </ul>
          
          ';

        }
      
      ?>
      
    </div>
  </div>
</nav>
<?php

    if(isset($_GET['error']) && $_GET['error']){
      echo '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Alert!</strong> ' . $_GET['error'] . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      
      ';
    }

?>