<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('user','exam')->latest()->get();
        return view('admin.results.index', compact('results'));
    }
    public function show(Result $result)
{
    return view('admin.results.show', compact('result'));
}

}
