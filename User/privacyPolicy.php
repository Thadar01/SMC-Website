<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy and Policy</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>

    <div class="privacyContainer">
        <div>
            <h3>Privacy Policy</h3>
            <p>This privacy policy outlines how we collect, use, and protect personal information. We are committed to
                ensuring that your privacy is protected. Should we ask you to provide certain information by which you
                can
                be identified when using this website, then you can be assured that it will only be used in accordance
                with
                this privacy statement.</p>



        </div>
        <div>
            <h3>We may collect the following information:</h3>
            <ul>
                <li>Name and contact information including email address</li>
                <li>Demographic information such as postcode, preferences, and interests</li>
                <li>Other information relevant to customer surveys and/or offers</li>
            </ul>
        </div>

        <div>
            <h3>What we do with the information we gather</h3>
            <p>We require this information to understand your needs and provide you with a better service, and in
                particular
                for the following reasons:</p>
            <ul>
                <li>Internal record keeping.</li>
                <li>We may use the information to improve our products and services.</li>
                <li>We may periodically send promotional emails about new products, special offers, or other information
                    which we think you may find interesting using the email address which you have provided.</li>
                <li>From time to time, we may also use your information to contact you for market research purposes.
                </li>
            </ul>
        </div>


        <div>
            <h3>Security</h3>
            <p>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or
                disclosure, we have put in place suitable physical, electronic, and managerial procedures to safeguard
                and
                secure the information we collect online.</p>
            <div></div>
        </div>

        <div>
            <h3>Controlling your personal information</h3>
            <p>You may choose to restrict the collection or use of your personal information in the following ways:</p>
            <ul>
                <li>whenever you are asked to fill in a form on the website, look for the box that you can click to
                    indicate
                    that you do not want the information to be used by anybody for direct marketing purposes</li>
                <li>if you have previously agreed to us using your personal information for direct marketing purposes,
                    you
                    may change your mind at any time by writing to or emailing us at
                    [smc@gmail.com]</li>
            </ul>
        </div>

        <p>We will not sell, distribute, or lease your personal information to third parties unless we have your
            permission or are required by law to do so. We may use your personal information to send you promotional
            information about third parties which we think you may find interesting if you tell us that you wish this to
            happen.</p>
    </div>
    <?php include("footer.php") ?>
    <script>
        document.getElementById("Here").innerHTML = " <b class='here'>You are at Legislation/Guidance Page</b>"
    </script>
</body>

</html>