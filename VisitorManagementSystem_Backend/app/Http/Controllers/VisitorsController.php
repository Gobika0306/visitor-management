<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
    
        return visitors::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'visitee' => 'required',
            'date of visit' => 'required',
            'purpose of visit' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ]);

        Visitors::create($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitors $visitors)
    {
        return response()->json([
            'visitors'=>$visitors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitors $visitors)
    {
        $visitors = Visitors::find($id);
        return view('visitors.edit')->with('visitors', $visitors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitors $visitors)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'visitee' => 'required',
            'date of visit' => 'required',
            'purpose of visit' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
        ]);

        $visitor = Visitor::find($id);
        $visitor->update($request->all());

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitors $visitors)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully');
    }
}
