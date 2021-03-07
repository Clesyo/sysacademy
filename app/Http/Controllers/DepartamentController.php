<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartamentController extends Controller
{
    //
    public function create()
    {
        $pages = ['all_departament'=>'Departamentos','Add Departamento'];
        return view('departament.departament_add', compact('pages'));
    }
    public function store(Request $request)
    {
        $notification = null;
        $departament = new Departament();

        $departament = $departament::create($request->all());

        if ($departament) {
            $notification = [
                'message' => 'Departamento incluido com sucesso!',
                'title' => 'Mensagem',
                'icon' => 'success'
            ];
        }else{
            $notification = [
                'message' => 'Opa! Algo deu errado, tente novamente.',
                'title' => 'Mensagem',
                'icon' => 'error'
            ];
         }

        return redirect('all_departament')->with($notification);
    }

    public function update(Request $request, $id)
    {
        $departament = Departament::findOrFail($id);

        $departament = $departament->update($request->all());

        if ($departament) {
            $notification = [
                'message' => 'Departamento incluido com sucesso!',
                'title' => 'Mensagem',
                'icon' => 'success'
            ];
        }else{
            $notification = [
                'message' => 'Opa! Algo deu errado, tente novamente.',
                'title' => 'Mensagem',
                'icon' => 'error'
            ];
         }

        return Redirect::back()->with($notification);
    }
}
