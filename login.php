<?php
// Include Database
include "db.php";
session_start();
// Initial a variabels
$username = "";
$username_err = "";
$password = "";
$password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the username to be not empty
    if (empty(trim($_POST["username"]))) {
        $password_err = "Please enter your username";
    } else {
        $username = trim($_POST["username"]);
    }
    // Validate the password to be not empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password";
    } else {
        $password = trim($_POST["password"]);
    }
    // Login the user if everything is ok
    if (empty(trim($username_err)) && empty(trim($password_err))) {
        $sql = "SELECT `id`, `username`, `password` FROM users WHERE username = '$username'";
        // Get the accounts from database
        $accounts = $db->query($sql);
        if ($accounts->rowCount() > 0) {
            foreach ($accounts as $account) {
                // Get the user infos
                $user_id = $account[0];
                $user_name = $account[1];
                $user_password_hash = $account[2];
                if (password_verify($password, $user_password_hash)) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $user_id;
                    $_SESSION["username"] = $user_name;
                    header("location: index.php");
                } else {
                    // Return a error if password doesnot match
                    $password_err = "Password is wrong. Try again";
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="container">
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {?>
        <h1> You are logged in</h1>
<?php } else {?>
    <h1>Login</h1>
    <div class="<?php echo (!empty(trim($password_err)) || !empty(trim($username_err))) ? "errors" : ""; ?>">

    </div>
    <form id="login_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit">
    </form>
<?php }
?>
    </div>

</body>
</html>
