<?php
session_start();

// reset opcional
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
} 