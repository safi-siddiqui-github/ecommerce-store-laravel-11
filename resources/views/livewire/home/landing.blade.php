<?php

use function Livewire\Volt\{layout, state, title};

layout('layout.app');
title('Home');

?>

<div>
    <h2 class="text-xl">Home Page</h2>
    <a href="{{route('login')}}" wire:navigate>Login</a>
</div>
