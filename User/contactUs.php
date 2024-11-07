<?php
include("connect.php");
session_start();
//use session
if (!isset($_SESSION['uID'])) {
    echo "<script>window.alert('SignIn Again!')</script>";
    echo "<script>window.location='userSignIn.php'</script>";
}
   

//save button

    if (isset($_POST['btnSave'])) {
        $uID = $_POST['txtuserID'];
        $uSuggestion = $_POST['txtsuggestion'];

        

        $insertQuery = "INSERT INTO userSuggestion (suggestionText,userID)
                        VALUES ('$uSuggestion','$uID')";
        $result = mysqli_query($connect, $insertQuery);

        if ($result) {
            echo "<script>alert('Your suggestion is sent successfully!');</script>";
            echo "<script>window.location='contactUs.php';</script>";
        } else {
            echo "<script>alert('Failed to send!');</script>";
            echo "<script>window.location='contactUs.php';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="contactMain">
        <form action="contactUs.php" method="POST" class="contactUsConatiner">
            <h2>Contact Us</h2>
            <table class>



                <input type="hidden" name="txtuserID" value="<?php echo $_SESSION['uID']; ?>">



                <tr class="contactContent">
                    <td> <label>Suggestion: </label>

                    </td>
                    <td> <textarea cols="35" rows="5" name="txtsuggestion" class="contactInput" required></textarea>

                    </td>
                </tr>

            </table>

            <div class="contactButtonContainer">
                <input type="submit" name="btnSave" value="Send" class="contactBtn" disabled>
                <input type="reset" name="btnClear" value="Clear" class="contactBtn">
            </div>
            <div class="contactPrivacy">
                <input type="checkbox" name="checkPrivacy" required onclick="toggleSubmitButton(this)">
                <a href="privacyPolicy.php">I agree to the Privacy Policy</a></label>
            </div>

        </form>
    </div>
    <?php include("footer.php") ?>
    <script>
    function toggleSubmitButton(thispara) {
        if (thispara.checked) {
            document.querySelector('input[type="submit"]').disabled = false;
        } else {
            document.querySelector('input[type="submit"]').disabled = true;
        }
    }
    document.getElementById("Here").innerHTML = " <b class='here'>You are here at Contact Us Page</b>"
    </script>
</body>

</html>