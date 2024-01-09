<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{

    public function index(): View
    {
        return view('admin/users/listmaster');
    }

    public function formAdd(): View
    {
        return view('admin/users/form_add');
    }
}
