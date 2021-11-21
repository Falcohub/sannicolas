<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function empresa()
    {
        return view('home.empresa');
    }
    public function servicios()
    {
        return view('home.servicios');
    }
    public function sedes()
    {
        return view('home.sedes');
    }
    public function contacto()
    {
        return view('home.contacto');
    }
}
