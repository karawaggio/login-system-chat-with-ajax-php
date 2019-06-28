<?php 
    include("includes/header.php"); 

    if (logged_in()){
        header("location:home.php");
        exit(); 
    }
    
    if (isset($post['signup-submit'])){
        $errors = array();
        if (trim($post['username']) == ''){
            $errors[] = "Username can't be blank";
        }

        else if (trim($post['email']) == ''){
            $errors[] = "Email can't be blank";
        }

        else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "Please enter valid email";
        }

        else if ($post['passwd'] == ''){
            $errors[] = "Password can't be blank";
        }

        else if (strlen($post['passwd']) < 5){
            $errors[] = "Password can't be less than 5 characters";
        }

        else if ($post['passwd'] !== $post['repeat-passwd']){
            $errors[] = "Passwords has to match";
        }

        if (empty($errors)){
            $userName = mysqli_escape_string($db_conn, $post['username']);
            $userEmail = mysqli_escape_string($db_conn, $post['email']);
            $userPwd = mysqli_escape_string($db_conn, $post['passwd']);
            $userPwd = password_hash($userPwd, PASSWORD_DEFAULT);

            $insert_user = "CALL insert_new_user('$userName', '$userEmail', '$userPwd')";
            $insert_result = mysqli_query($db_conn, $insert_user);
            
            if ($insert_result){
                header("location:index.php");
                exit();
            }
        } else {
            echo "<div class='error'>" . array_shift($errors) . "</div>"; 
        }
    }
    mysqli_close($db_conn);
?>
    <div class="create-acc-wrapper">
        <div class="form-container">
            <div class="signup-wrapper">
                <div class="signup-block">
                    <h1 class="signup-title">Create an account</h1>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" name="username" placeholder="Enter your username">
                        <input type="email" name ="email" placeholder="Enter your email"/>
                        <input type="password" name="passwd" placeholder="Enter your password" />
                        <input type="password" name="repeat-passwd" placeholder="Repeat your password" />
                        <input type="submit" name="signup-submit" value="Create my account"/>
                    </form>
                    <p class="signup-check">Already have an account? <a href="index.php">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>