<?php
include('connect.php');





// $admin = "CREATE TABLE admin
// (
//    adminID int NOT NULL PRIMARY KEY auto_increment,
//    adminName varchar (20),
//    adminEmail varchar (20),
//    adminPhone varchar (15),
//    adminPassword varchar(25)

// )";
// $user = "CREATE TABLE user
// (
//     userID int NOT NULL PRIMARY KEY auto_increment,
//     userName varchar (20),
//     userEmail varchar (20),
//     userPhone varchar (15),
//     Month varchar (15),
//     userPassword varchar(25)

// )";

// $userQuery = mysqli_query($connect, $user);
// if ($userQuery) {
//     echo "<script>window.alert('User table success')</script>";
// } else {
//     echo "<p>Error in User Statement</p>";
// }
// $adminQuery = mysqli_query($connect, $admin);
// if ($adminQuery) {
//     echo "<script>window.alert('admin table success')</script>";
// } else {
//     echo "<p>Error in admin Statement</p>";
// }


// $media = "CREATE TABLE socialMedia
// (
//    socialMediaID int NOT NULL PRIMARY KEY auto_increment,
//    socialMediaName varchar (20),
//    socialMediaDescription text,
//    socialPublishYear  varchar (10),
//    socialMediaPopularity varchar (25),
//    socialMediaPhoto text

// )";
// $mediaQuery = mysqli_query($connect, $media);
// if ($mediaQuery) {
//     echo "<script>window.alert('media table success')</script>";
// } else {
//     echo "<p>Error in media Statement</p>";
// }


// $campaign = "CREATE TABLE campaign
// (
//    campaignID int NOT NULL PRIMARY KEY auto_increment,
//    campaignTitle varchar (30),
//    campaignPhoto text,
//    campaignVision text,
//    campaignAim text,
//    campaignAddress varchar(100),
//    campaignLocation text,
//    campaignStart varchar (15),
//    campaignEnd varchar (15),
//    Duration varchar(10),
//    campaignStatus varchar(15),
//    socialMediaID int,
//    FOREIGN KEY (socialMediaID) references socialMedia (socialMediaID)


// )";
// $campaignQuery = mysqli_query($connect, $campaign);
// if ($campaignQuery) {
//     echo "<script>window.alert('campaign table success')</script>";
// } else {
//     echo "<p>Error in campaign Statement</p>";
// }


// $technique = "CREATE TABLE safeTechnique
// (
//    techniqueID int NOT NULL PRIMARY KEY auto_increment,
//    techniqueName varchar (30),
//    techniqueTips text,
//    techniqueBenefits text,
//    socialMediaID int,
//    FOREIGN KEY (socialMediaID) references socialMedia (socialMediaID)

// )";
// $techniqueQuery = mysqli_query($connect, $technique);
// if ($techniqueQuery) {
//     echo "<script>window.alert('technique table success')</script>";
// } else {
//     echo "<p>Error in technique Statement</p>";
// }


// $suggestion = "CREATE TABLE userSuggestion
// (
//    suggestionID int NOT NULL PRIMARY KEY auto_increment,
//    suggestionText text,
//     userID int,
//     FOREIGN KEY (userID) references user (userID)

// )";
// $suggestionQuery = mysqli_query($connect, $suggestion);
// if ($suggestionQuery) {
//     echo "<script>window.alert('suggestion table success')</script>";
// } else {
//     echo "<p>Error in suggestion Statement</p>";
// }

// $participate = "CREATE TABLE userParticipate
// (
//    participateID int NOT NULL PRIMARY KEY auto_increment,
//    participateDate varchar (20),
//    participateTime varchar (20),
//    userID int,
//    campaignID int,
//    FOREIGN KEY (userID) references user (userID),
//    FOREIGN KEY (campaignID) references campaign (campaignID)



// )";
// $participateQuery = mysqli_query($connect, $participate);
// if ($participateQuery) {
//     echo "<script>window.alert('participate table success')</script>";
// } else {
//     echo "<p>Error in participate Statement</p>";
// }