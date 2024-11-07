<?php
include("connect.php");
session_start();
if (isset($_POST['btnEdit'])) {
    $sid = $_POST['txtsugID'];
    $uid = $_POST['txtuserID'];
    $sugText = $_POST['txtsuggestion'];

    $edit = "UPDATE userSuggestion
    SET
    suggestionText='$sugText',
    userID='$uid' WHERE suggestionID='$sid'";
    $editResult = mysqli_query($connect, $edit);
    if ($editResult) {
        echo "<script>alert('Your Suggestion edited successfully!');</script>";
        echo "<script>window.location='history.php';</script>";
    } else {
        echo "<script>alert('Your Suggestion edited Fail!');</script>";
        echo "<script>window.location='history.php';</script>";
    }
}

$contactID = $_GET['sugid'];
$selectsQuery = "SELECT * FROM userSuggestion WHERE suggestionID='$contactID'";
$runSelectsQuery = mysqli_query($connect, $selectsQuery);
$fetchArray = mysqli_fetch_array($runSelectsQuery);
$suggestion = $fetchArray['suggestionText']


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Edit</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="contactMain">
        <form action="contactEdit.php" method="POST" class="contactUsConatiner">
            <h2>Contact Us</h2>
            <table class>



                <input type="hidden" name="txtuserID" value="<?php echo $_SESSION['uID']; ?>">
                <input type="hidden" name="txtsugID" value="<?php echo $contactID; ?>">



                <tr class="contactContent">
                    <td> <label>Suggestion: </label>

                    </td>
                    <td> <textarea cols="35" rows="5" name="txtsuggestion" class="contactInput"
                            required><?php echo $suggestion ?></textarea>

                    </td>
                </tr>

            </table>

            <div class="contactButtonContainer">
                <input type="submit" name="btnEdit" value="Edit" class="contactBtn">
                <input type="reset" name="btnClear" value="Clear" class="contactBtn">
            </div>


        </form>
    </div>
    <?php include("footer.php") ?>

</body>

</html>