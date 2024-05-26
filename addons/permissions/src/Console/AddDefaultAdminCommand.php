<?php

declare(strict_types=1);

namespace Obelaw\Permissions\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Obelaw\Permissions\Models\Admin;
use Obelaw\Permissions\Models\Rule;

final class AddDefaultAdminCommand extends Command
{
    public function handle(): void
    {

        if (!Admin::first()) {
            $email = 'admin@obelaw.test';
            $password = '123456';

            $rule = Rule::create([
                'name' => 'Super Admin',
                'permissions' => ['*'],
            ]);

            Admin::create([
                'rule_id' => $rule->id,
                'name' => 'Super Admin',
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $this->line('<fg=white;bg=blue> OBELAW ADMIN </>');
            $this->line('Email: ' . $email);
            $this->line('Password: ' . $password);
        } else {
            $this->line('<fg=black;bg=yellow> OBELAW HAS ADMIN </>');
        }
    }
}
