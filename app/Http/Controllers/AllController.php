<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AllController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     return view('all');
    // }
    public function index()
    {
        return view('all');
    }
     public function searchAutocomplete(Request $request)
    {
          $search = $request->get('term');
     
          $result = Account::where('name', 'LIKE', '%' . $search . '%')->pluck('name');
          
          return response()->json($result);
           
    } 
}
