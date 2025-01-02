<?php

namespace App\Http\Controllers;

use App\Models\staff_pustaka;
use App\Http\Requests\Storestaff_pustakaRequest;
use App\Http\Requests\Updatestaff_pustakaRequest;

class StaffPustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('general.staff');
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
    public function store(Storestaff_pustakaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatestaff_pustakaRequest $request, staff_pustaka $staff_pustaka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(staff_pustaka $staff_pustaka)
    {
        //
    }
}
