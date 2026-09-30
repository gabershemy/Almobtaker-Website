<?php
require_once __DIR__ . '/auth.php';

getAuthService()->logout();
header('Location: index.php');
exit;
