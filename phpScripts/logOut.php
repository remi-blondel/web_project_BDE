<?php
define( 'ROOT_DIR', 'http://localhost/web_project_bde/');
$_SESSION['user_id'] = NULL;
$_SESSION['role'] = NULL;

header('location:' . ROOT_DIR . 'authentication/Login.html');