<?php
include_once  __DIR__.'/../../../database/dbconfig2.php';

// System Configuration

$pdoQuery = "SELECT * FROM system_config LIMIT 1";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array());
$system_config = $pdoResult->fetch(PDO::FETCH_ASSOC);

$system_name = $system_config['system_name'];
$system_copyright = $system_config['copy_right'];
$system_number = $system_config['system_number'];
$system_email = $system_config['system_email'];
$system_config_last_update = $system_config['updated_at'];

// Logo Configuration

$pdoQuery = "SELECT * FROM system_logo LIMIT 1";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array());
$system_logo = $pdoResult->fetch(PDO::FETCH_ASSOC);

$logo = $system_logo['logo'];
$system_logo_last_update = $system_logo['updated_at'];

// SMTP MAILER

$pdoQuery = "SELECT * FROM email_config LIMIT 1";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array());
$email_config = $pdoResult->fetch(PDO::FETCH_ASSOC);

$smtp_email = $email_config['email'];
$smtp_password = $email_config['password'];
$email_config_last_update = $email_config['updated_at'];

// Google reCAPTCHA V3 API

$pdoQuery = "SELECT * FROM google_recaptcha_api LIMIT 1";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array());
$google = $pdoResult->fetch(PDO::FETCH_ASSOC);

$SKey =  $google['site_key'];
$SSKey =  $google['site_secret_key'];
$google_recaptcha_api_last_update =  $google['updated_at'];

// Superadmin Profile

$pdoQuery = "SELECT * FROM superadmin LIMIT 1";
$pdoResult = $pdoConnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array());
$superadmin_profile = $pdoResult->fetch(PDO::FETCH_ASSOC);

$superadmin_name = $superadmin_profile['name'];
$superadmin_email = $superadmin_profile['email'];
$profile = $superadmin_profile['profile'];
$current_password = $superadmin_profile["password"];
$superadmin_profile_last_update = $superadmin_profile['updated_at'];



?>