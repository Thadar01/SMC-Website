<?php
session_start();

include('connect.php');

if (isset($_POST['btnLogin'])) {
    $userLogEmail = $_POST['txtuseremail'];
    $userLogPsw = $_POST['txtuserpassword'];

    // Check the user based on email
    $selectUserQuery = "SELECT * FROM user WHERE userEmail='$userLogEmail'";
    $resultUserQuery = mysqli_query($connect, $selectUserQuery);
    $rows = mysqli_num_rows($resultUserQuery);

    if ($rows == 0) {
        echo "<script>window.alert('Please SignUp first!')</script>";
        echo "<script>window.location='userSignUp.php'</script>";

    } else {
        $arr = mysqli_fetch_array($resultUserQuery);
        $storedPass = $arr["userPassword"];


        if ($userLogPsw == $storedPass) {
            //add session here

            $userID = $arr['userID'];
            $userName = $arr['userName'];
            $_SESSION['uID'] = $userID;
            setcookie("user", "$userName", time() + 10, "/");

            echo "<script>window.alert('SignIn Successfully')</script>";
            echo "<script>window.location='index.php'</script>";
        } else {

            if (isset($_SESSION['SignInError'])) {
                $countError = $_SESSION['SignInError'];
                if ($countError == 1) {
                    echo "<script>window.alert('SignIn Failed 2: Incorrect password')</script>";
                    $_SESSION['SignInError'] = 2;
                } else if ($countError == 2) {
                    echo "<script>window.alert('SignIn Failed 3: Incorrect password')</script>";
                    echo "<script>window.location='timeCount.php'</script>";
                }
            } else {
                $_SESSION['SignInError'] = 1;
                echo "<script>window.alert('SignIn Failed1: Incorrect password')</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User SignIn</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">


</head>

<body class="signInScreen">
    <form action="userSignIn.php" name="userlogin" method="POST" class="userLogin">
        <div class="userLoginContainer">
            <h2>User SignIn</h2>
            <table>
                <tr class="userLoginLine">
                    <td><label>Email:</label></td>
                    <td><input type="email" name="txtuseremail" required placeholder="Enter your email"
                            class="loginInput"></td>
                </tr>

                <tr class="userLoginLine">
                    <td>
                        <label>Password:</label>
                    </td>
                    <td>
                        <input type="password" id="uLoginpassword" name="txtuserpassword" required
                            placeholder="Enter your password" class="loginInput">

                    </td>
                    <td>
                        <div class="checkbox"><input type="checkbox" onclick="showPassword()">
                            <p>Show</p>
                        </div>
                    </td>


                </tr>
            </table>
            <div class="userLoginButton">
                <input type="submit" name="btnLogin" value="SignIn" class="loginBtn" disabled>

                <a href="userSignUp.php">Sign Up</a>
            </div>

            <div class="g-recaptcha" data-sitekey="6Ldbq0sqAAAAAINTTW4hH18El42EeQETGzV3RWZK"
                data-callback="enableLogin"></div>
        </div>
    </form>

    <script>
    function showPassword() {
        var psw = document.getElementById("uLoginpassword");
        if (psw.type === "password") {
            psw.type = "text";
        } else {
            psw.type = "password";
        }
    }

    function enableLogin() {
        document.querySelector('input[type="submit"]').disabled = false;
    }
    </script>
</body>

</html>