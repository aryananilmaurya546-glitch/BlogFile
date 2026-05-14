<?php include '_dbconnect.php'; ?>

<?php
    //get the srno
    $srnoForDelete = $_GET['srno'];

    //first delete from the database
    $sqlToDelete = "DELETE FROM `file` WHERE `Srno` = '$srnoForDelete'";
    $resultSql = mysqli_query($conn, $sqlToDelete);

    //second delete from the upload folder
    unlink('../upload/default' . "$srnoForDelete" . '.zip');

    //redirect to the fileUpload.php
    header('Location: ../fileUpload.php');
    

?>