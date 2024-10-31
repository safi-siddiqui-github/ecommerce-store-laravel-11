<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\{layout, state, title};

layout('layout.auth');
title('Register');

state(['first_name', 'last_name', 'email', 'password', 'agree' => true]);

$register = function () {

    $this->validate(
        [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|string|unique:users|max:100',
            'password' => 'required|string|min:5|max:100',
            'agree' => 'required|boolean|in:1',
        ],
        [
            'agree' => 'Must agree to terms and conditions'
        ]
    );

    $user = new User();
    $user->first_name = $this->first_name;
    $user->last_name = $this->last_name;
    $user->email = $this->email;
    $user->password = $this->password;
    $user->terms_agreed_at = now();
    $user->save();

    $check = Auth::attempt([
        'email' => $this->email,
        'password' => $this->password,
    ], true);

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
            <h2 class="font-semibold text-2xl tracking-tight">Create your new account</h2>
            <div class="flex items-center gap-1 font-medium">
                <p class="text-black/50">Already a member?</p>
                <a href="{{route('login')}}" wire:navigate class="text-blue-700">Login now</a>
            </div>
        </div>

        <form wire:submit="register" class="flex flex-col gap-4">

            <div class="flex flex-col gap-1">

                <div class="flex gap-2">
                    <div class="flex flex-col gap-1 w-1/2">
                        <label for="first_name" class="font-medium">First Name</label>
                        <input id="first_name" type="text" wire:model="first_name" class="px-2 py-1 rounded border-2">
                    </div>

                    <div class="flex flex-col gap-1 w-1/2">
                        <label for="last_name" class="font-medium">Last Name</label>
                        <input id="last_name" type="text" wire:model="last_name" class="px-2 py-1 rounded border-2">
                    </div>
                </div>
                @error('first_name') <p class="text-red-500 font-medium">{{$message}}</p> @enderror
                @error('last_name') <p class="text-red-500 font-medium">{{$message}}</p> @enderror
            </div>

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

            <div class="flex flex-col gap-1">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="agree" wire:model="agree" class="size-3.5">
                    <div class="flex items-center gap-1 font-medium">
                        <label for="agree" class="cursor-pointer">Agree to</label>
                        <a href="{{route('home')}}" wire:navigate class="text-blue-700">Terms and conditions</a>
                    </div>
                </div>
                @error('agree') <p class="text-red-500 font-medium">{{$message}}</p> @enderror
            </div>

            <x-submit-button title="Register" />

        </form>

        <livewire:auth.social />

    </div>

    <img src="{{asset('auth/register-screen.svg')}}" alt="Login Screen" class="hidden md:block md:w-1/2 lg:w-3/5 2xl:w-2/3 md:object-cover md:h-screen max-h-screen  object-bottom">
</div>