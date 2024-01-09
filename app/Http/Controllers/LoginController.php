<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Helpers\AuthHelper;
use App\Models\AuthModel;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index(): View
    {
        $data = [
            'orden'  => isset($_GET['orden']) ? $_GET['orden'] : '',
            'idOrden' => isset($_GET['id']) ? $_GET['id'] : ''
        ];
        return view('auth/login', $data);
    }

    public function auth(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $password = $request->input('password');
        $res = collect(AuthModel::check($request));



        if ($res->isEmpty()) {
            return redirect("/")->with(["error" => "account not found"]);
        }

        if (AuthHelper::encrpyPassword($password) !== $res[0]->password) {
            return back()->with(["error" => 'Wrong Password'])->onlyInput('username');
        }

        $roles = DB::select("SELECT * FROM user_types WHERE id = '" . $res[0]->user_type_id . "'  ");

        session([
            'username' => $res[0]->username,
            'fullname' => $res[0]->first_name . ' ' . $res[0]->last_name,
            'idUser'   => $res[0]->id,
            'isLogin'  => 1,
            'roleIds'  => $res[0]->user_type_id,
            'roles'    => $roles[0]->user_type
        ]);



        if ($roles[0]->user_type == 'Supper Admin' || $roles[0]->user_type == 'Operadores') {
            if ($request->orden == "y") {
                return redirect('/ordendepago/formApprove?id=' . $request->idOrden);
            } else {
                return redirect('/dashboard');
            }
        } else if ($roles[0]->user_type == 'Admin') {
            return redirect('/dashboard');
        } else if ($roles[0]->user_type == 'Drivers') {
            return redirect('/drivers/services');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('/');
    }
}
