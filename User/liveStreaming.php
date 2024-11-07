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
    <title>Live Streaming</title>
    <link rel="stylesheet" type="text/css" href="style.css?s=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="homeMainConatainer">
    <div class="navAndSearch">
        <?php
        include('navbar.php')
        ?>

    </div>
    <div class="firstStreamingContainer">

        <div class="textSlides">
            <p class="firstTitle">What is Live Streaming?</p>
            <p class="firstBody">Live streaming is the process of broadcasting video and audio content in real-time
                over the internet. It allows viewers to watch events, games, or performances as they happen,
                offering a more interactive and engaging experience. Popular platforms for live streaming include
                YouTube, Twitch, and Facebook Live.</p>
        </div>
        <div class="textSlides">
            <p class="firstTitle">Benefits of Live Streaming</p>
            <p class="firstBody">Live streaming offers a range of benefits, including increased engagement,
                real-time feedback, and the ability to reach a global audience. It's an effective way to build a
                community, promote products, and share experiences.</p>
        </div>
        <div class="textSlides">
            <p class="firstTitle">Getting Started with Live Streaming</p>
            <p class="firstBody">To start live streaming, you'll need a few basic pieces of equipment, including a
                camera, microphone, and stable internet connection. You can use software or apps to broadcast your
                stream, and promote it through social media and other channels.</p>
        </div>

        <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("textSlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
        </script>
    </div>
    <div class="ytContainer">
        <iframe width="1500" height="800" src="https://www.youtube.com/embed/BSz5a5ryc-k?si=1otOtPB1nD6I5505"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="liveTipMain">
        <div class="tipContainer">

            <div class="tip ">
                <p class="tipTitle">Tip 1: Prepare Your Equipment</p>
                <p class="tipBody">Make sure your camera, microphone, and internet connection are stable and of high
                    quality.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 2: Plan Your Content</p>
                <p class="tipBody">Develop a content strategy to engage your audience and keep them coming back.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 3: Promote Your Stream</p>
                <p class="tipBody">Use social media and other channels to promote your live stream and attract viewers.
                </p>
            </div>


            <div class="tip">
                <p class="tipTitle">Tip 4: Engage with Your Audience</p>
                <p class="tipBody">Interact with your viewers through live chat, polls, and Q&A sessions.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 5: Monitor Your Stream</p>
                <p class="tipBody">Keep an eye on your stream's performance and adjust as needed.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 6: Follow Up</p>
                <p class="tipBody">After the stream, follow up with your audience and provide additional resources.</p>
            </div>

        </div>
        <div class="tipContainer">

            <div class="tip ">
                <p class="tipTitle">Tip 1: Personal Privacy Protection</p>
                <p class="tipBody">Ensuring that personal details and location are hidden from the audience keeps you
                    safe from identity theft and real-life threats.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 2: Prevention of Harassment</p>
                <p class="tipBody">By moderating chats and interactions, you can block unwanted behavior and create a
                    more positive experience for both you and your viewers.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 3: Reduced Risk of Account Hacking</p>
                <p class="tipBody">Strong security measures like MFA protect your streaming account from hackers who
                    could use it for malicious purposes.</p>
            </div>


            <div class="tip">
                <p class="tipTitle">Tip 4: Better Audience Control</p>
                <p class="tipBody">Limiting the audience to trusted friends or followers ensures that you can stream to
                    a safe community, reducing the risk of trolls or inappropriate users.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 5: Avoiding Legal Issues</p>
                <p class="tipBody">Staying compliant with platform rules and laws (such as copyright) prevents your live
                    stream from being taken down or facing legal action.</p>
            </div>
            <div class="tip">
                <p class="tipTitle">Tip 6: Professionalism</p>
                <p class="tipBody">Delaying the stream and using strong filters make your live streaming look more
                    polished and professional, with fewer interruptions or mistakes.</p>
            </div>

        </div>
    </div>
    <?php include("footer.php") ?>
    <script>
    document.getElementById("Here").innerHTML = " <b class='here'>You are here at Live Streaming Page</b>"
    </script>
</body>

</html>