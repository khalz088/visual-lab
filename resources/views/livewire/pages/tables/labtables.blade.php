<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



new #[Layout('layouts.app')] class extends Component
{


    /**
     * Handle an incoming registration request.
     */

}; ?>


<div class="py-12">
    <livewire:user-table/>

    <livewire:lab-table/>
</div>
