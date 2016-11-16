<?php

namespace proloc\Http\Controllers;

use proloc\Models\Ponto;
use Illuminate\Http\Request;
use proloc\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class LocalController extends Controller
{
    private $ponto;

    public function __construct(Ponto $ponto){
        $this->ponto = $ponto;
    }

    public function storeLocal(Request $request){
        $data = $request->all();

        $novoLocal =  Ponto::create($data);
        if($novoLocal){
            return Response::json([
                'success' => true,

            ]);
        }else{
            return Response::json([
               'fail' => true,
                'messagem' => 'Houve um ao localizar.'
            ]);
        }
    }


}
