<?php
include('connect.php');

if (isset($_POST['btnSignUp'])) {
    $userName = $_POST['txtusername'];
    $userEmail = $_POST['txtuseremail'];
    $userPhone = $_POST['txtuserphone'];
    $userMonth = $_POST['txtMonth'];
    $userPassword = $_POST['txtuserpassword'];
    $userCPassword = $_POST['txtuserpassword1'];

    $checkUserEmail = " SELECT * FROM user WHERE userEmail='$userEmail'";
    $ResulUserEmail = mysqli_query($connect, $checkUserEmail);

    $rows = mysqli_num_rows($ResulUserEmail);

    $num = preg_match('@[0-9]@', $userPassword);
    $uppercase = preg_match('@[A-Z]@', $userPassword);
    $lowercase = preg_match('@[a-z]@', $userPassword);
    $specialcha = preg_match('@[^\w]@', $userPassword);



    if (strlen($userPassword) < 8 || !$num || !$uppercase || !$lowercase || !$specialcha) {
        echo "<script>window.alert('Password must be at least 8 characters long and include a number, uppercase letter, lowercase letter, and a special character.')</script>";
        echo "<script>window.location='userSignUp.php'</script>";
    } elseif ($rows > 0) {
        echo "<script>window.alert('This email is already registered')</script>";
        echo "<script>window.location='userSignUp.php'</script>";
    } else {
        if ($userPassword == $userCPassword) {

            $insertUser = "INSERT INTO user(userName,userEmail,userPhone,Month,userPassword)
        VALUES ('$userName','$userEmail','$userPhone','$userMonth','$userPassword')";
            $saveResult = mysqli_query($connect, $insertUser);
            if ($saveResult) {
                echo "<script>window.alert('Sign up successful!')</script>";
                echo "<script>window.location='userSignIn.php'</script>";
            } else {
                echo "<script>window.alert('Error: Unable to sign up.')</script>";
                echo "<script>window.location='userSignUp.php'</script>";
            }
        } else {
            echo "<script>window.alert('Passwords do not match!')</script>";
            echo "<script>window.location='userSignUp.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User SignUp</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="signInScreen">
    <form action="userSignUp.php" name="userreg" method="POST" class="userLogin">
        <div class="userLoginContainer">
            <h2>User Sign Up</h2>
            <table>
                <tr class="userLoginLine">
                    <td><label>Name:</label></td>
                    <td> <input type="text" name="txtusername" required placeholder="Enter your name"
                            class="loginInput">
                    </td>
                </tr>
                <tr class="userLoginLine">
                    <td><label>Email:</label></td>
                    <td><input type="email" name="txtuseremail" required placeholder="Enter your email"
                            class="loginInput"></td>
                </tr>
                <tr class="userLoginLine">
                    <td><label>Phone number :</label></td>
                    <td><input type="text" name="txtuserphone" required placeholder="Enter your phone number"
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
                <tr class="userLoginLine">
                    <td>
                        <label> Confirm Password :</label>
                    </td>
                    <td>
                        <input type="Password" id="password1" name="txtuserpassword1" required
                            placeholder="Enter your password" class="loginInput">

                    </td>
                    <td>
                        <div class="checkbox"><input type="checkbox" onclick="showPassword1()">
                            <p>Show</p>
                        </div>
                    </td>


                </tr>
            </table>


            <div class="userLoginButton">
                <input type="submit" name="btnSignUp" value="SignUp" class="loginBtn">


                <a href="userSignIn.php">SignIn </a>

            </div>
        </div>
    </form>

    <script>
    function showPassword() {
        var psw = document.getElementById("uLoginpassword");
        if (psw.type === "password") {
            psw.type = "text"
        } else {
            psw.type = "password"
        }
    }

    function showPassword1() {
        var y = document.getElementById("password1");
        if (y.type === "password") {
            y.type = "text"
        } else {
            y.type = "password"
        }
    }
    </script>
</body>

</html>