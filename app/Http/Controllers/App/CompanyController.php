<?php

namespace App\Http\Controllers\App;

use App\Src\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function company_data()
    {
        return view('app.company.show-company')->with(['view_name' => "Datos de la Empresa"]);
    }
}
