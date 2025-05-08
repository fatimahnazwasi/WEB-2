<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;


class UnitkerjaController extends Controller
{
    public function index()
    {
        $unitkerja = UnitKerja::all();

        return view("unit-kerja.index", compact('unitkerja'));
    }
}
    