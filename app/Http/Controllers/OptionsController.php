<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;


class OptionsController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('admin.options.index')->with('options', $options);
    }
    // Edit Option
    public function edit($id)
    {
        $option = Option::findOrFail($id);
        return view('admin.options.edit', compact('option'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $option = Option::findOrFail($id);
        $option->update($request->all());

        return redirect()->route('admin.options.index')->with('success', 'Option updated successfully');
    }

    // Delete Option

    public function destroy($id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect()->route('admin.options.index')->with('success', 'Option successfully deleted');
    }


    // Create Option
    public function create()
    {
        return view('admin.options.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $option = new Option();
        $option->name = $request->name;
        $option->description = $request->description;
        $option->price = $request->price; // Explicitly set price value
        $option->save();

        return redirect()->route('admin.options.index')->with('success', 'Option created successfully');
    }
}
