<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function index() {
        $myName = $this->getUser();
        $cesaeInfo = $this->getCesaeInfo();

        $loginUser = [
            'name'  => 'Laís',
            'email' => 'lais@email.com',
            'phone' => '235626434'
        ];
        return view('utils.homepage', compact('myName', 'loginUser', 'cesaeInfo'));
    }

    public function hello(){
        $myName = $this->getUser();
        return view('utils.hello', compact('myName'));
    }

    // -- GETTERS --
    private function getUser(){
        // query a base de dados para buscar o user
        $myName = 'Laís';
        return $myName;
    }

    private function getCesaeInfo(){
        return $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso, 186, 4150-212, Porto',
            'email' => 'cesae@cesae.pt'
        ];
    }
}
