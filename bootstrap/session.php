<?php

use App\Dao\UserDao;

session_start();

if (isset($_COOKIE['remember_me']) && !isset($_SESSION['user'])) {
    $user = (new UserDao())->where(['remember_token' => $_COOKIE['remember_me']])->first();

    if ($_COOKIE['remember_me'] == $user['remember_token']) {
        $_SESSION['user'] = $user;
    }
}
