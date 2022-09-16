<?php 
session_start();

    $db_host        = 'localhost';
    $db_user        = 'admin';
    $db_pass        = 'admin';
    $db_database    = 'chessopenings101';
    $id = $_GET['id'];



    if($con = mysqli_connect($db_host,$db_user,$db_pass,$db_database))
    {
        $sql = "UPDATE questions SET accepted='1' WHERE id = '".$id."';";
        $sql_result = mysqli_query($con,$sql);
        if(!$sql_result)
        {
            echo "<p> Query [$sql] couldn't be executed </p>";
            echo mysqli_error($con);
        }
    }
    else
    {
        echo "<script>alert(\"Error connecting to Database\");</script>";
    }
    mysqli_close($con);
    header("Location: unapprovedquestions.php");
?>