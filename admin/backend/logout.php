<?php

session_start();

session_destroy();

header('Location: ./auth-sign-in.php?logged-out=true');
?>