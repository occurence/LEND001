<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use App\Models\Transact;
use App\Models\Remit;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accounts = Account::all();
        $roles = Role::all();
        return view('accounts.index', compact(['accounts', 'roles']));//, compact(['accounts'])//->with($accounts)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $account = Account::findOrFail($id);
        $transacts = Transact::all();
        $remits = Remit::all();
        return view('accounts.show', compact(['account', 'transacts', 'remits']));//

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchAutocomplete(Request $request)
    {
          $search = $request->get('term');
          $result = Account::where('name', 'LIKE', '%' . $search . '%')->pluck('name');
          return response()->json($result);
           
    } 
}
