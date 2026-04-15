<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
   public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword != '') {
            $attractions= Attraction::where('name', 'LIKE', "%{$keyword}%")->paginate(3);
        } else {
            $attractions= Attraction::paginate(3);
        }
        return view('pages.attraction.indexAttraction', compact('attractions'));
    }

public function create() {
    return view('pages.attraction.createAttraction');
}

public function store(Request $request) {
    // dd($request->all());
    Attraction::create($request->all());
    return redirect()->route('attractions.index')->with('success', 'Data Tersimpan!');
}

public function edit($id) {
    $attractions = Attraction::find($id);
    return view('pages.attraction.updateAttraction', compact('attractions'));
}

public function update(Request $request, $id) {
    $attractions = Attraction::find($id);
    $attractions->update($request->all());
    return redirect('/attraction')->with('success', 'Data Diupdate!');
}

public function destroy($id) {
    $attractions = Attraction::find($id);
    $attractions->delete();
    return redirect('/attraction')->with('success', 'Data Dihapus!');
}
}

