<?php

session_start();
if (!isset($_SESSION['uID'])) {
    echo "<script>window.alert('SignIn Again!')</script>";
    echo "<script>window.location='userSignIn.php'</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents Session</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="firstParentContainer">
        <div class="parentTextCon">
            <p class="parentText">Parents</p>
            <p class="parentText can">Can</p>
            <p class="parentText manage">Manage</p>
            <p class="parentText your">Your</p>
            <p class="parentText child">Child's</p>
            <p class="parentText safty">Safty.</p>

        </div>
        <div class="imageSlide"><img name="slideshow"></div>
        <script>
            var i = 0;
            var images = [];
            images[0] = "image/Parents.jpg";
            images[1] = "image/sm.jpg";
            images[2] = "image/Smedia.jpg";

            function slideshowImage() {
                document.slideshow.src = images[i];
                if (i < 2) {
                    i++;
                } else {
                    i = 0;
                };
                setTimeout("slideshowImage()", 3000);

            }
            window.onload = slideshowImage();
        </script>
    </div>
    <div class="secondParentContainer">
        <div class="secondParentLeft">
            <p class="parentImportance">Why parents are important?</p>
            <p class="parentPara">Parents play a crucial role in ensuring a safe social media environment for their
                children. By monitoring
                their online activity, setting appropriate boundaries, and educating them about the risks and
                responsible use of social platforms, parents can help protect children from cyberbullying, inappropriate
                content, and online predators. Active involvement and open communication also empower kids to make safer
                choices and understand the importance of privacy and respect online.</p>
        </div>
        <div class="parentTips">
            <h3>Parent Tips</h3>
            <ul>
                <li>Monitor your child's online activity regularly.</li>
                <li>Set appropriate boundaries and rules for social media use.</li>
                <li>Educate your child about online safety and responsible social media behavior.</li>
                <li>Encourage open communication about their online experiences.</li>
                <li>Be a good role model by demonstrating responsible social media behavior yourself.</li>
            </ul>
        </div>

    </div>

    <div class="secondParentContainer">
        <div class="parentTips">
            <h3>Advantages of Parents Managing Child's Social Media</h3>
            <ul>
                <li>Increased safety from online predators.</li>
                <li>Better understanding of online behavior.</li>
                <li>Ability to set appropriate boundaries.</li>
                <li>Encouragement of responsible online use.</li>
                <li>Open communication about online experiences.</li>
            </ul>
        </div>
        <div class="parentTips">
            <h3>Disadvantages of Lack of Management</h3>
            <ul>
                <li>Increased risk of cyberbullying.</li>
                <li>Exposure to inappropriate content.</li>
                <li>Potential for online addiction.</li>
                <li>Difficulty in understanding online privacy.</li>
                <li>Vulnerability to online scams and predators.</li>
            </ul>
        </div>
    </div>
    <?php include("footer.php") ?>
    <script>
        document.getElementById("Here").innerHTML = " <b class='here'>You are here at Parents Session Page</b>"
    </script>
</body>

</html>