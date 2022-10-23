<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = \App\Models\User::inRandomOrder()->first();
    dd(
//        User::flagged('wasSentWelcomeMail')->get(),
//        User::notFlagged('wasSentWelcomeMail')->get(),
        $user->hasFlag('wasSentWelcomeMail'),
        $user,
    );

    \App\Models\User::inRandomOrder()
        ->take(5)
        ->get()
        ->each(function (\App\Models\User $user) {
            \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\WelcomeMail($user));

            $user->flag('wasSentWelcomeMail');
        });
});
