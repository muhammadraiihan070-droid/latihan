<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;

        $destination = Destination::when($keyword, function ($query, $keyword) {
            return $query->where('name', 'like', "%$keyword%");
        })
        ->orderBy('id')
        ->paginate(5)
        ->withQueryString();

        return view('pages.destination.indexDestinasi', compact('destination'));
    }

    public function show(int $id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.destination.detaildestinasi', compact('destination'));
    }

    public function create()
    {
        return view('pages.destination.createDestination');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'ticket_price' => 'required|numeric',
            'description' => 'nullable',
            'working_days' => 'nullable',
            'working_hours' => 'nullable',
        ]);

        Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'working_days' => $request->working_days,
            'working_hours' => $request->working_hours,
            'ticket_price' => $request->ticket_price,
        ]);

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil tambah data');
    }

    public function edit(int $id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.destination.editDestination', compact('destination'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'ticket_price' => 'required|numeric',
            'description' => 'nullable',
            'working_days' => 'nullable',
            'working_hours' => 'nullable',
        ]);

        $destination = Destination::findOrFail($id);

       $destination->update([
    'name' => $request->name,
    'description' => $request->description,
    'location' => $request->location,
    'working_days' => $request->working_days ?? '-',
    'working_hours' => $request->working_hours ?? '-',
    'ticket_price' => $request->ticket_price,
]);

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil update');
    }

    public function delete(int $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil hapus');
    }
}