<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//TODO: Integração com o google
//TODO: Listar pastas e arquivos
//TODO: Download de determinado arquivo

class DriveController extends Controller
{
    public function index()
    {
        return view("drive.index");
    }
}
