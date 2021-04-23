<?php


$maila = new PHPMailer\PHPMailer\PHPMailer(true);

$maila->IsSMTP(); // enable SMTP

$maila->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$maila->SMTPAuth = true; // authentication enabled
$maila->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$maila->Host = "ssl0.ovh.net";
$maila->Port = 465; // or 587
$maila->IsHTML(true);
$maila->Username = "thomas@greenit.co";
$maila->Password = "nbdgetq$14";
$maila->SetFrom("thomas@greenit.co");

/*$link = "http://localhost:8888/GreenIT/";*/
$link = "https://greenit.co/";

?>