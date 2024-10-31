<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\{layout, state, title};

layout('layout.auth');
title('Login');

state(['email', 'password', 'remember' => true]);

$login = function () {

    $this->validate([
        'email' => 'required|email|string|exists:users|max:100',
        'password' => 'required|string|min:5|max:100',
        'remember' => 'required|boolean',
    ]);

    $check = Auth::attempt([
        'email' => $this->email,
        'password' => $this->password,
    ], $this->remember);

    if (!$check) {
        throw ValidationException::withMessages(['password' => 'Incorrect password']);
    }

    return $this->redirectRoute('home', navigate: true);
};

?>

<div class="flex flex-col md:flex-row md:items-center">

    <div class="flex flex-col overflow-y-scroll h-screen scrollbar px-5 py-10 gap-8 min-w-72 md:w-1/2 md:p-8 md:py-14 lg:w-2/5 lg:py-16 xl:py-20 2xl:w-1/3 2xl:justify-center">

        <h2 class="text-4xl xl:text-5xl font-semibold tracking-tighter">Ecommerce <span class="text-blue-700">App</span></h2>

        <div class="flex flex-col gap-1">
            <h2 class="font-semibold text-2xl tracking-tight">Sign in to your account</h2>
            <div class="flex items-center gap-1 font-medium">
                <p class="text-black/50">Not a member?</p>
                <a href="{{route('register')}}" wire:navigate class="text-blue-700">Register now</a>
            </div>
        </div>

        <form wire:submit="login" class="flex flex-col gap-4">

            <div class="flex flex-col gap-1">
                <label for="email" class="font-medium">Email Address</label>
                <input id="email" type="text" wire:model="email" class="px-2 py-1 rounded border-2">
                @error('email') <p class="text-red-500 font-medium">{{$message}}</p> @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label for="password" class="font-medium">Password</label>
                <x-password-input />
                @error('password') <p class="text-red-500 font-medium">{{$message}}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" wire:model="remember" class="size-3.5">
                    <label for="remember" class="font-medium cursor-pointer">Remember me</label>
                </div>

                <a href="{{route('register')}}" wire:navigate class="font-medium text-blue-700">Forgot Password?</a>
            </div>

            <x-submit-button title="Login" />

        </form>

        <livewire:auth.social />

    </div>

    <img src="{{asset('auth/login-screen.svg')}}" alt="Login Screen" class="hidden md:block md:w-1/2 lg:w-3/5 2xl:w-2/3 md:object-cover md:h-screen max-h-screen">
</div>