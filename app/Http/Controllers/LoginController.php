<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class LoginController extends Controller
{

    /*---------POST PERÒ SEPARAT------*/
    //CONTROLADOR DE LA PRACTICA
    public function professor(){
        $email = Request('email');
        $password = Request('password');
        //P01: $variablecontrolador = $v1;
        return view('user.professor')->with('email',$email);
    }

    public function alumne(){
        $email = Request('email');
        $password = Request('password');
        //P01: $variablecontrolador = $v1;
        return view('user.alumne')->with('email',$email);
    }

    public function centre(){
        $email = Request('email');
        $password = Request('password');
        //P01: $variablecontrolador = $v1
        
        return view('user.centre')->with('email',$email);
    }

    /*---------ERROR------*/
    public function error(){
        $email = Request('email');
        $password = Request('password');
        return view('user.error');
    }

    /*---------LLOGICA DE NEGOCI------*/
    public function loginGeneral()
    {
        $email = Request('email');
        $password = Request('password');
        //$consulta = Usuari.where('email', $email);
        if($email === 'joseporiol@itic.bcn'){
            return view('user.professor')->with('email',$email);
        }
        else if($email === '2023_alumne@itic.bcn'){
            return view('user.alumne')->with('email',$email);
        }
        else if($email === '2023_secretaria@itic.bcn'){
            $professors = [
                [
                    'id' => 1,
                    'nom' => 'Josep Oriol',
                    'email' => 'joseporiol@itic.bcn',
                    'curs' => 'DAW 2B',
                ],
                [
                    'id' => 2,
                    'nom' => 'Juanma',
                    'email' => 'juanmasanbel@itic.bcn',
                    'curs' => 'DAW 2A',
                ],
                [
                    'id' => 3,
                    'nom' => 'Faro',
                    'email' => 'jjfaro@itic.bcn',
                    'curs' => 'SMX 1B',
                ]
                ];
            return view('user.centre')->with('email',$email)->with('professors', $professors);
        }
        else{
            return view('user.error');
        }
    }


}
