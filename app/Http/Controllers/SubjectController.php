<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $pages = ['Disciplinas'];
        return view('',compact('pages'));
    }
    
    public function create()
    {
        $pages = ['all_subjects' => 'Disciplinas', 'Add Disciplina'];
        return view('',compact('pages'));
    }

    public function store(Request $request)
    {
        $notification = null;
        $subject = new Subject();

        $request->validate([
            'name' => ['required', 'max:255']
        ]);
        
        $subject = $subject::create($request->all());

        if($subject){
            $notification = [
                'message' => 'Disciplina incluída com sucesso.',
                'title' => 'Mensagem',
                'icon' => 'success',
            ];
        }else{
            $notification = [
                'message' => 'Ops! Algo deu errado, tente novamente.',
                'title' => 'Aviso',
                'icon' => 'error',
            ];
        }
        return redirect('all_subjects')->with($notification);
    }
}
