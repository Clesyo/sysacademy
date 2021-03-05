<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $pages = ['Professores'];
        return view('teacher.teacher_index', compact('pages'));
    }
    
    public function create()
    {
        $pages = ['all_professors' =>'Professor','Add Professor'];
        // dd($pages);
        return view('teacher.teacher_add', compact('pages'));
    }
}
