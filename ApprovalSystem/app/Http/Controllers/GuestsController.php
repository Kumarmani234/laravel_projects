<?php

namespace App\Http\Controllers;

use App\Models\Guests;
use Illuminate\Http\Request;



class GuestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $Guests = Guests::all();
        return response()->json([
            'status' => 'success',
            'Guests' => $Guests,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'guestName' => 'required|string|max:255',
            'purpose_of_visit' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',

        ]);

        $Guests = Guests::create([
            'guestName' => $request->guestName,
            'purpose_of_visit' => $request->purpose_of_visit,
            'address' => $request->address,
            'image' => $request->image,
            'assigned_to' => $request->assigned_to,

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Guest created successfully',
            'Guests' => $Guests,
        ]);
    }

    public function show($id)
    {
        $Guests = Guests::find($id);
        return response()->json([
            'status' => 'success',
            'Guests' => $Guests,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guestName' => 'required|string|max:255',
            'purpose_of_visit' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',
        ]);

        $Guests = Guests::find($id);
        $Guests->guestName = $request->guestName;
        $Guests->purpose_of_visit = $request->purpose_of_visit;
        $Guests->address = $request->address;
        $Guests->assigned_to = $request->assigned_to;
        $Guests->image = $request->image;
        $Guests->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Guest updated successfully',
            'Guests' => $Guests,
        ]);
    }

    public function destroy($id)
    {
        $Guests = Guests::find($id);
        $Guests->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Guest deleted successfully',
            'Guests' => $Guests,
   ]);
}
}
