<?php
session_start();

session_destroy();

echo "<script>window.alert('SignOut!')</script>";
echo "<script>window.location='index.php'</script>";
?>