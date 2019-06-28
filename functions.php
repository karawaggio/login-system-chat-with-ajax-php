<?php
    /* Connect to Databse */
    $db_conn = db_connect();

    function db_connect(){
        /* add your server name */
        $server = 'localhost';
        /* add your user name */
        $user = 'root';
        /* add your password */
        $pwd = 'root';
        /* add your database name */
        $dbname = 'ajax_php_mysql_chat';
    
        $conn = new mysqli($server, $user, $pwd, $dbname);
        confirm_db_connect($conn);
        return $conn;
    }

    /* Catch database connection errors */
    function confirm_db_connect($connection){
        if ($connection->connect_errno){
            $error = "Database connection failed: ";
            $error .= $connection->connect_error;
            $error .= ". Error No: " . $connection->connect_errno;
            exit($error);
        }
    }

    /* Check if there is data in php $_SESSION or $_COOKIE superglobals with index username */
    function logged_in(){
        if (isset($_SESSION['username']) || isset($_COOKIE['username'])){
            return true;
        } else {
            return false;
        }
    }