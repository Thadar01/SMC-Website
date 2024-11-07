<?php
include('connect.php');

//insert into database
if (isset($_POST['btnRegister'])) {
    $adminName = $_POST['txtadminname'];
    $adminEmail = $_POST['txtadminemail'];
    $adminPhone = $_POST['txtadminphone'];
    $adminPassword = $_POST['txtadminpassword'];
    $adminCPassword = $_POST['txtadminpassword1'];

    $checkadminEmail = " SELECT * FROM admin WHERE adminEmail='$adminEmail'";
    $resultAdminEmail = mysqli_query($connect, $checkadminEmail);
    //to change the number of rows 
    $rows = mysqli_num_rows($resultAdminEmail);

    $num = preg_match('@[0-9]@', $adminPassword);
    $uppercase = preg_match('@[A-Z]@', $adminPassword);
    $lowercase = preg_match('@[a-z]@', $adminPassword);
    $specialcha = preg_match('@[^\w]@', $adminPassword);

    //check password legths and characters

    if (strlen($adminPassword) < 8 || !$num || !$uppercase || !$lowercase || !$specialcha) {
        echo "<script>window.alert('Password must be at least 8 characters long and include a number, uppercase letter, lowercase letter, and a special character.')</script>";
        echo "<script>window.location='adminSignUp.php'</script>";
    } elseif ($rows > 0) {
        echo "<script>window.alert('Email already exists! Please try again.')</script>";
        echo "<script>window.location='adminSignUp.php'</script>";
    } else {
        //check passwords
        if ($adminPassword == $adminCPassword) {

            $insertadmin = "INSERT INTO admin(adminName,adminEmail,adminPhone,adminPassword)
        VALUES ('$adminName','$adminEmail','$adminPhone','$adminPassword')";
            $saveResult = mysqli_query($connect, $insertadmin);
            if ($saveResult) {
                echo "<script>window.alert('Register successful!')</script>";
                echo "<script>window.location='index.php'</script>";
            } else {
                echo "<script>window.alert('Error: Unable to register.')</script>";
                echo "<script>window.location='adminRegister.php'</script>";
            }
        } else {
            echo "<script>window.alert('Passwords do not match!')</script>";
            echo "<script>window.location='adminRegister.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body>
    <form action="adminRegister.php" name="adminreg" method="POST" class="adminLogin">
        <div class="adminLoginContainer">
            <h2>Admin Register</h2>
            <table>
                <tr class="adminLoginLine">
                    <td> <label>
                            Name :
                        </label></td>
                    <td> <input type="text" name="txtadminname" required placeholder="Enter your name"
                            class="loginInput">
                    </td>



                </tr>

                <tr class="adminLoginLine">
                    <td> <label>
                            Email :
                        </label></td>
                    <td> <input type="email" name="txtadminemail" required placeholder="Enter your email"
                            class="loginInput">
                    </td>


                </tr>

                <tr class="adminLoginLine">
                    <td> <label>
                            Phone number :
                        </label></td>
                    <td><input type="text" name="txtadminphone" required placeholder="Enter your phone number"
                            class="loginInput"></td>



                </tr>

                <tr class="adminLoginLine">
                    <td> <label>
                            Password :
                        </label></td>
                    <td> <input type="Password" id="password" name="txtadminpassword" required
                            placeholder="Enter your password" class="loginInput">
                    </td>
                    <td>
                        <div class="checkbox"><input type="checkbox" onclick="showPassword()">
                            <p>Show</p>
                        </div>
                    </td>



                </tr>
                <tr class="adminLoginLine">
                    <td> <label>
                            Confirm Password :
                        </label></td>
                    <td> <input type="Password" id="password1" name="txtadminpassword1" required
                            placeholder="Enter your password" class="loginInput">
                    </td>
                    <td>
                        <div class="checkbox"><input type="checkbox" onclick="showPassword1()">
                            <p>Show</p>
                        </div>
                    </td>


                </tr>
            </table>
            <div class="adminLoginButton">
                <input type="submit" name="btnRegister" value="Register" class="loginBtn">


                <a href="index.php">Login </a>

            </div>

        </div>
    </form>

    <script>
    function showPassword() {
        var psw = document.getElementById("password");
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