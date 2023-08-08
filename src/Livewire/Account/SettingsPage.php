<?php

namespace Obelaw\Framework\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Obelaw\Framework\Pipeline\Locale\Languages;
use Obelaw\Framework\Views\Layout\DashboardLayout;

class SettingsPage extends Component
{
    public $admin;

    public $language;

    protected $components = [];

    public function mount()
    {
        $this->admin = Auth::guard('obelaw')->user();

        $this->language = $this->admin->lang;

        $this->components = [
            'obelaw-account-settings-update-password',
        ];
    }

    public function render()
    {
        return view('obelaw::settings', [
            'languages' => Languages::getLanguages(),
            'components' => $this->components,
        ])->layout(DashboardLayout::class);
    }

    public function submitLanguage()
    {
        if ($this->admin->lang == $this->language) {
            return false;
        }

        $this->admin->lang = $this->language;
        $this->admin->save();
        return redirect()->route('obelaw.account.settings');
    }
}
