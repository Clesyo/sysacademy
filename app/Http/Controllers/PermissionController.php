<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $pages = ['Permissões'];
        return view('',compact('pages'));
    }

    public function create()
    {
        $pages = ['all_permissions'=>'Permissões','Add Permissão'];
        return view('',compact('pages'));
    }

    public function store(Request $request)
    {
        $notification = null;
        $permission = new Permission();

        $permission = $permission::create($request->all());

        if ($permission) {
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
