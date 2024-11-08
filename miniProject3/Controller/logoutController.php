<?php
session_start(); // Mulai sesi

// Hapus semua variabel sesi
$_SESSION = array();

// Jika ada cookie sesi, hapus cookie tersebut
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();

// Hapus cookie login jika ada
if (isset($_COOKIE['user_logged_in'])) {
    setcookie('user_logged_in', '', time() - 3600, "/");
}
if (isset($_COOKIE['email'])) {
    setcookie('email', '', time() - 3600, "/");
}
if (isset($_COOKIE['level'])) {
    setcookie('level', '', time() - 3600, "/");
}

// Redirect ke halaman login
header("Location: ../Views/index.php");
exit();
?>
