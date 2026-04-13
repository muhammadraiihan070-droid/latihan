<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\models\Destinations;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
      $keyword = $request->input ( key: 'search');
      if ($keyword != '') {
       $destinations = Destinations::where('name', 'LIKE', "%{$keyword}%")->paginate(3);
      }else{
        $destinations = Destinations::paginate(3);
      }
        return view('pages.indexDestinasi', compact('destinations'));
        //
    }

    public function show($id)
    {
        $destination = Destinations::find($id);
        return view('pages.detaildestinasi', compact('destination'));
        //
    }


    public function create()
{
    return view('pages.createDestination');
}

public function store(Request $request)
{
    Destinations::create($request->all());

    return redirect('/destinations')->with('success', 'Destination created successfully.');
}



    public function delete($id)
    {
        $destination = Destinations::find($id);
        if ($destination) {
            $destination->delete();
            return redirect('/destinations')->with('success', 'Destination deleted successfully.');
        } else {
            return redirect('/destinations')->with('error', 'Destination not found.');
        }
        
    }
public function edit($id)
{
    $destination = Destinations::find($id);
    return view('pages.editDestination', compact('destination'));
}

public function update(Request $request, $id)
{
    $destination = Destinations::find($id);
    if ($destination) {
        $destination->update($request->all());
        return redirect('/destinations')->with('success', 'Destination updated successfully.');
    } else {
        return redirect('/destinations')->with('error', 'Destination not found.');
    }
}
}