<?php

use App\Models\User;

if (!function_exists('user')) {
    function user(): ?User
    {
        if (auth()->check()) {
            return auth()->user();
        }

        return null;
    }
}
