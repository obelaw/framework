<?php

declare(strict_types=1);

namespace Obelaw\Framework\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Obelaw\Framework\ACL\Models\Admin;
use Obelaw\Framework\ACL\Models\AdminRule;
use Obelaw\Framework\ACL\Models\Rule;

final class InstallCommand extends Command
{
    protected $signature = 'obelaw:install';

    protected $description = 'Install the system';

    public function handle(): void
    {
        $email = 'admin@obelaw.test';
        $password = '123456';

        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $rule = Rule::create([
            'name' => 'Super Admin',
            'permissions' => ['*'],
        ]);

        AdminRule::create([
            'admin_id' => $admin->id,
            'rule_id' => $rule->id,
        ]);

        $this->line('<fg=white;bg=blue> OBELAW ADMIN </>');
        $this->line('Email: ' . $email);
        $this->line('Password: ' . $password);
    }
}
