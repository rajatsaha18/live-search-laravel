<?php

namespace App\Http\Controllers;

use App\Models\SearchModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
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
