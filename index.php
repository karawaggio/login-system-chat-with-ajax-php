<?php
    try {
        require_once 'functions.php';
    } catch(Exception $e) {
        $error = $e->getMessage();
    }

    // Start session
    session_start();
         
    include("includes/header.php"); 
    
    if (logged_in()){
        header("location:chat.php");
        exit(); 
    }

    if (isset($post['login-submit'])){
        $errors = array();
        if (trim($post['username']) == ''){
            $errors[] = "Username can't be blank";
        }

        else if (trim($post['passwd']) == ''){
            $errors[] = "Password can't be blank";
        }

        if (empty($errors)){
            $userName = mysqli_escape_string($db_conn, $post['username']);
            $userPwd = mysqli_escape_string($db_conn, $post['passwd']);
            $rememberUser = isset($post['rememberme']);

            $check_user = "CALL get_user_info('$userName')";
            $check_result = mysqli_query($db_conn, $check_user);
           
            if (mysqli_num_rows($check_result) == 1) {
                while ($row = mysqli_fetch_array($check_result, MYSQLI_ASSOC)) {
                    $retrievedUser = $row['username'];
                    $retrievedPwd = $row['passwd'];
                    if ($userName !== $retrievedUser || !password_verify($userPwd, $retrievedPwd)){                    
                        echo "<div class='error'>Either your username or your password were incorrect</div>";
                    } else {
                        $_SESSION['username'] = $userName; 
                        
                        if ($rememberUser == "on"){
                            setcookie('username', $userName, time()+3600);
                        }
                        header("location:chat.php");
                    }
                }
                mysqli_free_result($check_result);
            } else {
                echo"<div class='error'>This username doesn't exist. Do you want to create an account?</div>";
            }        
        } else {
            echo "<div class='error'>" . array_shift($errors) . "</div>"; 
        }
    }
    mysqli_close($db_conn);
?>
    <div class="login-form-wrapper">
        <div class="form-container">
            <div class="login-wrapper">
                <div class="login-block">
                    <h1 class="login-title">Login</h1>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" name="username" placeholder="Enter your username"/>
                        <input type="password" name="passwd" placeholder="Enter your password" />
                        <div class="checkbox-wrap">
                            <input type="checkbox" name="rememberme" id="rememberme">
                            <label for="rememberme">Keep me logged in</label>
                        </div>
                        <input type="submit" name="login-submit" value="Login"/>
                    </form>
                    <div class="login-check-block">
                        <p class="login-check">Don't have an account? <a href="signup.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>