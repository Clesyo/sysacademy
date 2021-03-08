<?php

namespace App\Http\Controllers;

use App\Models\Andress;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Keygen\Keygen;

class StudentController extends Controller
{
    public function index()
    {
        $pages = ['Alunos'];
        return view('',compact('pages'));
    }
    
    function create()
    {
        $pages = ['all_students'=>'Alunos', 'Add Alunos'];
        return view('', compact('pages'));
    }
    
    public function stora(Request $request)
    {
        $notification = null;
        $registration = null;
        $student = new Student();
        $user = new User();
        $andress = new Andress();
        $datas = $request->all();

        $request->validate([
            'name' => ['required','string','max:255'],
            'document' => ['required','string','unique:students'],
            'registration' => ['required','string','unique:students'],
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

        do {
            $registration = rand(10, 10000);
            $registerAldeadyExists = Student::where('registration', $registration)->first();
        } while ($registerAldeadyExists != null);

        $datas = [
            'user_id' => $user->id,
            'andress_id' => $andress->id,
            'registration' => $registration
        ];
        $student = $student::create($student);

        if($student){
            $notification = [
                'message' => 'Aluno incluído com sucesso.',
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
        return redirect('all_students')->with($notification);
    }
}
