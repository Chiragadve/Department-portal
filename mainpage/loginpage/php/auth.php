<?php
include_once 'session_start.php';

function login($username)
{
    $_SESSION['log']=1;
    $_SESSION['username']=$username;
}
function logout()
{
    unset($_SESSION['log']);
    unset($_SESSION['username']);
}

function islogged()
{
    return (!empty($_SESSION['log']) && $_SESSION['log']==1);
}

