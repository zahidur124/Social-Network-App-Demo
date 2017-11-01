<?php
session_start();
include "controller/connector.php";
include 'controller/commentController.php';

if(empty($_POST['comment']))
	die();

create($conn, $_POST['postid'], $_POST['comment'],$_SESSION['uid']);
