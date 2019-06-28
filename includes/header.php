<?php     
    // add functions.php to all pages
    try {
        require_once 'functions.php';
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
    
    // Start session
    session_start();

    // Variables for PHP $_GET and $_POST Super Globals to make them shorter to type
    $post = $_POST;
    $get = $_GET;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <title>AJAX, PHP & MySQL Chat by Sergey Karavaev</title>
</head>
<body>