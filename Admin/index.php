<?php
session_start();

include('connect.php');

if (isset($_POST['btnLogin'])) {
    $adminLogEmail = $_POST['txtadminemail'];
    $adminLogPsw = $_POST['txtadminpassword'];

    // check the admin based on email
    $selectAdminQuery = "SELECT * FROM admin WHERE adminEmail='$adminLogEmail'";
    $resultAdminQuery = mysqli_query($connect, $selectAdminQuery);
    $rows = mysqli_num_rows($resultAdminQuery);

    if ($rows == 0) {
        echo "<script>window.alert('Please Register first!')</script>";
    } else {
        $arr = mysqli_fetch_array($resultAdminQuery);
        $storedPass = $arr["adminPassword"];


        if ($adminLogPsw == $storedPass) {


            $adminID = $arr['adminID'];
            $adminName = $arr['adminName'];
            $_SESSION['aID'] = $adminID;
            $_SESSION['aName'] = $adminName;

            echo "<script>window.alert('LogIn Successfully')</script>";
            echo "<script>window.location='adminCampaign.php'</script>";
        } else {
            echo "<script>window.alert('LogIn Fail')</script>";
            echo "<script>window.location='index.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body>
    <form action="index.php" name="adminreg" method="POST" class="adminLogin">
        <div class="adminLoginContainer">
            <h2>Admin Login</h2>
            <table>

                <tr class="adminLoginLine">
                    <td><label>
                            Email :
                        </label></td>
                    <td> <input type="email" name="txtadminemail" required placeholder="Enter your email"
                            class="loginInput">
                    </td>



                </tr>



                <tr class="adminLoginLine">
                    <td> <label>
                            Password :
                        </label></td>
                    <td> <input type="Password" id="password" name="txtadminpassword" required
                            placeholder="Enter your password" class="loginInput"></td>
                    <td>
                        <div class="checkbox"><input type="checkbox" onclick="showPassword()">
                            <p>Show</p>
                        </div>
                    </td>


                </tr>

            </table>
            <div class="adminLoginButton">
                <input type="submit" name="btnLogin" value="Login" class="loginBtn">


                <a href="adminRegister.php">Register </a>

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
    </script>
</body>

</html>