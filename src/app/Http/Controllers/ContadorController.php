<?php

namespace App\Http\Controllers;

use App\Traits\ToastTrigger;
use Illuminate\Http\Request;

class ContadorController extends Controller
{
    use ToastTrigger;

    public function index()
    {
        $número = 200;
        return view('contador', compact('número'));
    }

    public function incrementar($número)
    {
        $número++;
        $this->alert('Precaución: número incrementado');
        return view('contador', compact('número'));
    }

    public function decrementar($número)
    {
        $número--;
        $this->errorToast('Número decrementado');
        return view('contador', compact('número'));
    }
}
