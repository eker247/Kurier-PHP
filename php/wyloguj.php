<?php
session_start();
$_SESSION['isLoggedIn'] = 'no';
$_SESSION['username'] = '';
session_destroy();
header("Location: /");
