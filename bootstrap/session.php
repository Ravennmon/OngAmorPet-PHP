<?php

session_start();

use App\Core\Request;
use App\Dao\UserDao;

function login(Request $request)
{
    $user = (new UserDao())->where(['email' => $request->email])->first();

    $_SESSION['user'] = $user;

    if ($request->remember) {
        remember($user);
    }
    
}

function logout()
{
    session_destroy();
    setcookie('remember_token', '', time() - 3600, "/");
    redirect('/login');
}

if (isRemembered() && !isLoggedIn()) {
    $user = (new UserDao())->where(['remember_token' => $_COOKIE['remember_token']])->first();

    if ($_COOKIE['remember_token'] == $user['remember_token']) {
        $_SESSION['user'] = $user;
    }
}

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function isRemembered()
{
    return isset($_COOKIE['remember_token']);
}

function remember($user)
{
    $token = bin2hex(random_bytes(16));
    setcookie('remember_token', $token, time() + 60 * 60 * 24 * 30, '/');
    (new UserDao())->update(['remember_token' => $token], $user['id']);
}