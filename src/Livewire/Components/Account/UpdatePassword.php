<?php

namespace Obelaw\Framework\Livewire\Components\Account;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $admin;

    public $password = null;
    public $confirm_password = null;

    public function mount($admin)
    {
        $this->admin = $admin;
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="row row-cols-5 g-5">
                <div class="col-md-4">
                    <h2 class="page-title mb-3">{{ __('obelaw::settings.password') }}</h2>
                    <p>{{ __('obelaw::settings.password_desc') }}</p>
                </div>
                <div class="col-md-8">
                    <form class="card" wire:submit.prevent="submit">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('obelaw::settings.password_desc') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label required">{{ __('obelaw::settings.password') }}</label>
                                <div class="col">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                        wire:model.defer="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-hint">{{ __('obelaw::settings.password_hint') }} </small>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-3 col-form-label required">{{ __('obelaw::settings.confirm_password') }}</label>
                                <div class="col">
                                    <input type="password" class="form-control" placeholder="Password"
                                        wire:model.defer="confirm_password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">

                                @if (session()->has('success'))
                                    <span class="text-green p-2">
                                        @svg('tabler-circle-check', 'icon me-1')
                                        {{ session('success') }}
                                    </span>
                                @endif

                                <button type="submit" class="btn btn-primary ms-auto">{{ __('obelaw::settings.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        BLADE;
    }

    public function submit()
    {
        if (!$this->password) {
            return $this->addError('password', __('obelaw::settings.must_enter_password'));
        }

        if ($this->password !== $this->confirm_password) {
            return $this->addError('password', __('obelaw::settings.not_match'));
        }

        $this->admin->password = Hash::make($this->password);
        $this->admin->save();

        session()->flash('success', __('obelaw::settings.password_updated'));
    }
}
