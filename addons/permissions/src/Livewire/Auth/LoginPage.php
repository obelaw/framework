<?php

namespace Obelaw\Permissions\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Obelaw\Permissions\Views\Layout\AuthLayout;

class LoginPage extends Component
{
    public $email;
    public $password;
    public $remember;

    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('obelaw-permissions::auth.login')->layout(AuthLayout::class);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if (Auth::guard('obelaw')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $validatedData['remember'])) {
            return redirect(route('obelaw.home'));
        } else {
            $this->addError('email', 'This e-mail is not authorized to access');
        }
    }
}
