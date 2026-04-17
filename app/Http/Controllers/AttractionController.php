<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Destination;

class AttractionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $attractions = Attraction::where('nam','like',"%$keyword%")->latest()->paginate(5);

        return view('pages.attraction.indexAttraction', compact('attractions'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('pages.attraction.createAttraction', compact('destinations'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Attraction::create($request->all());

        return redirect()->route('attractions.index')->with('success', 'Berhasil tambah data');
    }

    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('pages.attraction.showAttraction', compact('attraction'));
    }

    public function edit($id)
    {
        $destinations = Destination::all();
        $attraction = \App\Models\Attraction::findOrFail($id);
        return view('pages.attraction.editAttraction', compact('attraction', 'destinations'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);

        $attraction->update($request->all());

        return redirect()->route('attractions.index')->with('success', 'Berhasil update');
    }

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();

        return redirect()->route('attractions.index')->with('success', 'Berhasil hapus');
    }
}