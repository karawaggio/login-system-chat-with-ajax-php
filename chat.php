<?php 
    include("includes/header.php");

    if (logged_in()){
        echo (isset($_SESSION['username'])) ? "<div class='userpanel'>Howdy " . $_SESSION['username'] . "!<a href='logout.php'> Logout</a></div>" : 
                                              "<div class='userpanel'>Howdy " . $_COOKIE['username'] . "!<a href='logout.php'> Logout</a></div>";
    } else {
        header("location:index.php");
        exit(); 
    }
?>
<div class="chat-wrapper">
    <h1>AJAX, PHP & MySQL Chat</h1>
    <div id="chat-container">
        <div id="show-messages"></div>
        <input id="uname" type="text" name="username" placeholder="Enter your username">
        <textarea id="msg" name="message" placeholder="Enter your message"></textarea>
        <input onclick="sendMessage()" id="submit-btn" type="submit" name="submit-msg" value="Send"/>
    </div>    
</div>
<script src="scripts/chat.js" defer></script>
<?php include("includes/footer.php"); ?>