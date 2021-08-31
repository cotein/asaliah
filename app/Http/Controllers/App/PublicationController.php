<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    public function create()
    {
        return view('app.publications.new')->with(['view_name' => "Publicar productos"]);
    }
}
