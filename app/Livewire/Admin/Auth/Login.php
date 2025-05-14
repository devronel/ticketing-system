<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            if (Auth::attempt($credentials)) {
                session()->regenerate();

                if (Auth::user()->can('admin-dashboard.view')) {
                    return $this->redirect('/dashboard');
                } else {
                    return $this->redirect('/agent-dashboard');
                }
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
