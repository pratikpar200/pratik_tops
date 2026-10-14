<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function adminGuard()
{
    if (!session()->has('admin_id')) {
        return redirect('/admin/login')
            ->with('error', 'Please login first');
    }

    return null;
}
}
