<?php
session_start(); //Starting session

//if session exit, user needs to sign in or sign up
if (isset($_SESSION['login_id'])) {
    if (isset($_SESSION['pageStore'])) {
        $pageStore = $_SESSION['pageStore'];
        header("location: $pageStore"); //redirecting to profile page?
    }
}

//login process start, if the user presses signin button
if (isset($_POST['signIn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Username and password shouldn't be empty.";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        //make a connection with MySQL server
        include('config.php');
        $sQuery = "SELECT id, password FROM account WHERE email=? LIMIT 1";

        //To protect from MySQL injection for security purposes
        $stmt = $conn->prepare($sQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id, $hash);
        $stmt->store_result();

        if ($stmt->fetch()) {
            if (password_verify($password, $hash)) {
                $_SESSION['login_id'] = $id;

                if (isset($_SESSION['pageStore'])) {
                    $pageStore = $_SESSION['pageStore'];
                } else {
                    $pageStore = "index.php";
                }
                header("location: $pageStore"); //Redirect to profile page
                $stmt->close();
                $conn->close();
            } else {
                echo "Invalid Username and Password";
            }
        } else {
            echo "Invalid Username and Password";
        }
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up - McKinley Comics Co.</title>
    <link rel="stylesheet" type="text/css" href="rlform.css" />
</head>

<body>
    <div class="rlform">
        <div class="rlform rlform-wrapper">
            <div class="rlform-box-inner">
                <form method="post">
                    <p>Sign in to continue.</p>
                    <div class="rlform-group">
                        <label>Email</label>
                        <input type="email" name="email" class="rlform-input" required>
                    </div>

                    <div class="rlform-group">
                        <label>Password</label>
                        <input type="password" name="password" class="rlform-input" required>
                    </div>

                    <button type="submit" class="rlform-btn" name="signIn">Sign In</button>

                    <div class="text-foot">
                        <a href="register.php"> Don't have an account? Click here to register </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html> 