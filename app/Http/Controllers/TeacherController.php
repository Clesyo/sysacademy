<?php

namespace App\Http\Controllers;

use App\Models\Andress;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Keygen\Keygen;

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

    public function store(Request $request)
    {
        $notification = null;
        $teacher = new Teacher();
        $user = new User();
        $andress = new Andress();
        $datas = $request->all();

        $request->validate([
            'name' => ['required','string','max:255'],
            'document' => ['required','string',],
            'email' => ['required','string','email','max:255','unique:students'],
            'password' => ['required','string', 'min:8', 'confirmed'],
            'cell_phone' => ['required','string',],
            'andress.zip_code' => ['required','string',],
            'andress.andesss' => ['required','string',],
            'andress.locality' => ['required','string',],
            'andress.district' => ['required','string',],
            'andress.zone' => ['required','string',],
        ]);

        $user_result = User::where('email', $datas['user']->email);
        if($user_result){
            return null;
        }

        $user_data = $datas['user'];
        $user_data = [
            'token' => Keygen::alphanum(10)->generate(),
        ];
        $user = $user::create($user_data);

        $andress_data = $datas['andress'];
        $andress = $andress::create($andress_data);

        unset($datas['user']);
        unset($datas['andress']);
        $datas = [
            'user_id' => $user->id,
            'andress_id' => $andress->id
        ];
        $teacher = $teacher::create($datas);

        if($teacher){
            $notification = [
                'message' => 'Professor incluído com sucesso.',
                'title' => 'Messagem',
                'icon' => 'success',
            ];
        }else{
            $notification = [
                'message' => 'Ops! Algo deu errado, tente novamente.',
                'title' => 'Aviso',
                'icon' => 'error',
            ];
        }
        return redirect('all_teachers')->with($notification);
    }
}
