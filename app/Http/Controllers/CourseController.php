<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $pages = ['Cursos'];
        return view('', compact('pages'));
    }
    
    public function create()
    {
        $pages = ['all_courses'=>'Cursos', 'Add Curso'];
        return view('', compact('pages'));
    }

    public function store(Request $request)
    {
        $notification = null;
        $course = new Course();

        $request->validate([
            'name' => ['require', 'max:255', 'unique:courses']
        ]);

        $course = $course::create($request->all());

        if($course){
            $notification = [
                'message' => 'Curso incluído com sucesso.',
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
        return redirect()->back()->with($notification);
    }
}
