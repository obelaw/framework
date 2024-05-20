<?php

namespace Obelaw\Permissions\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::guard('obelaw')->logout();

        return redirect()->route('obelaw.admin.login');
    }
}
