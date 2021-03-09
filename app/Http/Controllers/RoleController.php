<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $pages = ['Funções'];
        return view('',compact('pages'));
    }

    public function create()
    {
        $pages = ['all_roles'=>'Funções', 'Add Função'];
        return view('',compact('pages'));
    }

    public function store(Request $request)
    {
        $notification = null;
        $role = new Role();

        $role = $role::create($request->all());

        if ($role) {
            $notification = [
                'message' => 'Função incluída com sucesso.',
                'title' => 'Mensagem',
                'icon' => 'success',
            ];
        }else{
            $notification = [
                'message' => 'Ops! Algo deu errado, tente novamente.',
                'title' => 'Mensagem',
                'icon' => 'success',
            ];
        }
        return redirect('all_roles')->with($notification);
    }
}
