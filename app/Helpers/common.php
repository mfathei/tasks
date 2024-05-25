<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;

const USERS_TAG = 'users';
const USERS_CACHE = 'users';

if (!function_exists('usersCache')) {
    function usersCache() {
        return Cache::tags(USERS_TAG)->rememberForever(USERS_CACHE, function () {
            return User::all();
        });
    }
}

if (!function_exists('adminsFromCache')) {
    function adminsFromCache() {
        return usersCache()->filter->isAdmin();
    }
}

if (!function_exists('usersFromCache')) {
    function usersFromCache() {
        return usersCache()->reject->isAdmin();
    }
}

if (!function_exists('clearUsersCache')) {
    function clearUsersCache() {
        Cache::tags(USERS_TAG)->forget(USERS_CACHE);
    }
}
