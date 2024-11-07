<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legislation and Guidance</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">

</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div>
        <img src="image/legal2.jpg" class="legalImage">
    </div>

    <div class="legalContainer">
        <p>Relevant Legislation and Best Practice Guidance</p>
        <ul>
            <li><strong>Children's Online Privacy Protection Act (COPPA):</strong> Protects the privacy of children
                under 13 by requiring parental consent for data collection.</li>
            <li><strong>General Data Protection Regulation (GDPR):</strong> Ensures that personal data of individuals,
                including minors, is processed lawfully and transparently.</li>
            <li><strong>Online Safety Bill (UK):</strong> Aims to make the internet safer for children by imposing
                duties on social media platforms to protect users from harmful content.</li>
            <li><strong>Best Practice Guidance from the National Society for the Prevention of Cruelty to Children
                    (NSPCC):</strong> Offers advice on how parents can keep children safe online, including monitoring
                and communication strategies.</li>
            <li><strong>Internet Watch Foundation (IWF):</strong> Provides resources for reporting and removing child
                sexual abuse content online, emphasizing the importance of vigilance.</li>
            <li><strong>Digital Economy Act:</strong> Introduces measures to protect children from accessing
                inappropriate content online, including age verification requirements for adult sites.</li>
            <li><strong>Family Online Safety Institute (FOSI):</strong> Offers guidelines and resources for families to
                navigate online safety, including tips for discussing social media use with children.</li>
            <li><strong>Social Media Platforms' Community Guidelines:</strong> Each platform has its own set of rules
                and guidelines aimed at protecting users, especially minors, from harmful content and interactions.</li>
            <li><strong>Cyberbullying Legislation:</strong> Various laws exist to address and prevent cyberbullying,
                providing frameworks for schools and parents to take action against online harassment.</li>
            <li><strong>Parental Control Software Recommendations:</strong> Best practices suggest using parental
                control tools to monitor and manage children's online activities effectively.</li>
        </ul>
    </div>
    <?php include("footer.php") ?>
    <script>
    document.getElementById("Here").innerHTML = " <b class='here'>You are at Legislation/Guidance Page</b>"
    </script>
</body>

</html>