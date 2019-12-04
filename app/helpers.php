<?php

/**
 * Active pages
 */
function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

/**
 * Return active guard
 */
function getActiveGuard()
{
    if (Auth::guard('doctor')->check())
        return 'doctor';

    else if (Auth::guard('patient')->check())
        return 'patient';
    
    else
        return 'web';
}