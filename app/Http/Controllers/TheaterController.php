<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theater;
use Illuminate\Support\Str;

class TheaterController extends Controller
{
     public function index()
    {
        $theaters = Theater::filter(request(['search']))->latest()->paginate(10);
        return view('admin.theater.index', compact('theaters'));
    }

    public function create()
    {
        return view('admin.theater.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:theaters,name',
        ]);
        $slug = Str::slug($request['name']);
        Theater::create($request->all() + ['slug' => $slug]);

        return redirect()->route('theaters')->with('success', 'Theater created successfully.');
    }

   
    public function edit(string $slug)
    {
        $theater = Theater::whereSlug($slug)->firstOrFail();
        return view('admin.theater.edit', compact('theater'));
    }

    public function update(Request $request, string $slug)
    {
        $theater = Theater::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'name' => 'required|string|max:255|unique:theaters,name,' . $theater->id,
        ]);
        $slug = Str::slug($formFields['name']);
        $theater->update($formFields+['slug'=>$slug]);
        return redirect()->route('theaters')->with('success', 'Theater updated successfully.');
    }

    public function destroy(string $slug)
    {
        $theater = Theater::whereSlug($slug)->firstOrFail();
        $theater->delete();
        return redirect()->route('theaters')->with('success', 'Theater deleted successfully.');
    }
}
