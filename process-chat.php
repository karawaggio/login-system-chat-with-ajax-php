<?php 
    include('includes/header.php');
    
    if (isset($post['username']) && isset($post['message'])){
        $userName = mysqli_real_escape_string($db_conn, $post['username']);
        $chatMsg = mysqli_real_escape_string($db_conn, $post['message']);

        if ((trim($userName) != '') && (trim($chatMsg) != '')){
            // using sql procedure 'insert_msg_info' with 2 parameters
            $sql = "CALL insert_msg_info('$userName', '$chatMsg')";
            mysqli_query($db_conn, $sql);
        }
    }

    if (isset($post['chatUpdate'])) {
        // using sql procedure 'display_all_messages' with 2 parameters
        $sql = "CALL display_all_messages";
        $result = mysqli_query($db_conn, $sql);
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $userName = $row['username'];
            $chatMsg = $row['message'];
            $time = $row['msgtime'];
            echo "<small>" . $time . "</small><br><span><strong>" . $userName . "</strong></span>: <span>" . $chatMsg . "</span></br></br>";
        }
    }
?>