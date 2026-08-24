<?php
session_start();

// Hapus seluruh data session
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// Redirect sesuai pemicu tombol
if (isset($_GET['redirect']) && $_GET['redirect'] === 'booth') {
    header("Location: ./");
    exit;
}

header("Location: login");
exit;
?>