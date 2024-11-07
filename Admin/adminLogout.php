<?php
session_start();

session_destroy();

echo "<script>window.alert('LogOut!')</script>";
echo "<script>window.location='index.php'</script>";
?>