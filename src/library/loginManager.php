<?php

// find user that matches login email
function matchUser ($loginEmail) {
    $userData = json_decode(file_get_contents('../../resources/users.json'), true)['users'];
    foreach ($userData as $key => $value) {
        if ($value['email'] === $loginEmail) {
            return $value;
        } 
    }
};

// match the user from the login, and check pw
function checkLogin() {
    $loginEmail = $_POST['email'];
    $loginPassword = $_POST['password'];

    if (isset($loginEmail) && isset($loginPassword)) {
        $user = matchUser($loginEmail);        
    } else {
        return;
    } 

    if (password_verify($loginPassword, $user['password'])) {
        session_start();
        $_SESSION["email"] = $user['email'];
        header('Location: ../dashboard.php');
    } else {
        header('location: ../../index.php?error=pw');
    }
};


?>

