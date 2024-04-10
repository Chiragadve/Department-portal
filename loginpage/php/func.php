<?php
include 'session_start.php';

function er_msg($error)
{
    if (isset($_SESSION['error'][$error]))
    {
        return "<p style='color: rgba(226,50,25,0.98)'>".$_SESSION['error'][$error]."</p>";
    }
}