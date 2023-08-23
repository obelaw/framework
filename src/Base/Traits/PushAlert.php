<?php

namespace Obelaw\Framework\Base\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait PushAlert
{
    use LivewireAlert;

    protected function pushAlert($type = 'success', $massage)
    {
        $this->alert($type, $massage, [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
