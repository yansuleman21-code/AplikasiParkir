<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    public function index()
    {
        return view('area_parkir.index');
    }

    public function create()
    {
        return view('area_parkir.create');
    }

    public function store(Request $request)
    {
        // sementara kosong dulu
        return redirect()->route('area-parkir.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}