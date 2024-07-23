<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transact;
use App\Models\Req;
use App\Models\Type;
use App\Models\Status;

class TransactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accounts = Account::all();
        $transacts = Transact::all();
        $reqs = Req::all();
        $types = Type::all();
        $statuses = Status::all();
        return view('transacts.index', compact(['accounts', 'transacts', 'reqs', 'types', 'statuses']));
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
}
