<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $imageName = basename($imagePath);
        }

        Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'working_days' => $request->working_days,
            'working_hours' => $request->working_hours,
            'ticket_price' => $request->ticket_price,
            'image' => $imageName,
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
        $validated = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'ticket_price' => 'required|numeric',
            'description' => 'nullable',
            'working_days' => 'required',
            'working_hours' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,png',
        ]);

        $destination = Destination::findOrFail($id);

        // hapus gambar lama jika upload baru
        if ($destination->image && $request->hasFile('image')) {
            Storage::disk('public')->delete('image/' . $destination->image);
        }

        // upload gambar baru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $validated['image'] = basename($imagePath);
        }

        $destination->update($validated);

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil update');
    }

    public function delete(int $id)
    {
        $destination = Destination::findOrFail($id);

        // hapus gambar dari storage
        if ($destination->image) {
            Storage::disk('public')->delete('image/' . $destination->image);
        }

        $destination->delete();

        return redirect()->route('destinations.index')
                         ->with('success', 'Berhasil hapus');
    }
}