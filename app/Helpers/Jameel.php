<?php

use Illuminate\Support\Facades\Auth;

function getUser()
{
    if(Auth::check()) 
    {
        return Auth::user()->firstname;
    }  

    return "unknown";
}

function checkLogin()
{
    if(Auth::check())
    {
        return true;
    }

    return false;
}