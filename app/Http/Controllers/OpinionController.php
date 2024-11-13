<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::all();
        return view('opinions.index', compact('opinions'));
    }

    public function create()
    {
        return view('opinions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'date' => 'required|date',
            'usefulness' => 'required|integer|min:0',
        ]);

        Opinion::create($request->all());

        return redirect()->route('opinions.index')->with('success', 'Opinion created successfully.');
    }

    public function show(Opinion $opinion)
    {
        return view('opinions.show', compact('opinion'));
    }

    public function edit(Opinion $opinion)
    {
        return view('opinions.edit', compact('opinion'));
    }

    public function update(Request $request, Opinion $opinion)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'date' => 'required|date',
            'usefulness' => 'required|integer|min:0',
        ]);

        $opinion->update($request->all());

        return redirect()->route('opinions.index')->with('success', 'Opinion updated successfully.');
    }

    public function destroy(Opinion $opinion)
    {
        $opinion->delete();
        return redirect()->route('opinions.index')->with('success', 'Opinion deleted successfully.');
    }
}
