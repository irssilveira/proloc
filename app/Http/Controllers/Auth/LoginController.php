<?php

namespace proloc\Http\Controllers\Auth;

use proloc\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use proloc\Models\Unidades;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;use ValidatesRequests;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $unidades;
    public function __construct(Unidades $unidades)
    {
        $this->unidades = $unidades;
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function mostraUnidade(){
        $unidades = $this->unidades->get();

        return view('auth.login',compact('unidades'));
    }

    
}
