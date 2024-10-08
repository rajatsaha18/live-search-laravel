<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use App\Models\SearchModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function form()
    {
        return view('form');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $formData = new FormData();
        $formData->name  = $request->name;
        $formData->email = $request->email;
        $formData->save();

        return response()->json(['success' => 'From Submit Successfully']);
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            $data = SearchModel::where('title','LIKE',"%{$query}%")->get();

            return response()->json($data);
        }
    }
}
