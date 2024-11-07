<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Counter</title>
</head>

<body>
    <h1>You cannot SignIn again for 10 minutes.</h1>
    <h2><span id="timecount">10min:00s</span></h2>
    <script>
    var seconds = 600;

    function updateCountDown() {
        var minutes = Math.floor(seconds / 60);
        var remainingSeconds = seconds % 60;
        document.getElementById("timecount").textContent = minutes + "min:" + remainingSeconds + "s";
        seconds--;
        if (seconds < 0) {
            window.location.href = 'userSignIn.php'
        }
    }
    setInterval(updateCountDown, 1000)
    </script>
</body>

</html>