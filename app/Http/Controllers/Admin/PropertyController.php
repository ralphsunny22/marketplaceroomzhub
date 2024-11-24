<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posting;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allProperty($status="")
    {
        $properties = Property::all();
        if ($status=="") {
            $status = 'All';
            $properties = Property::all();
        } else {
            $properties = Property::where('status', $status)->get();
        }

        $allStatus = [
            ['name'=>'featured', 'bgColor'=>'success'],
            ['name'=>'completed', 'bgColor'=>'primary'],
            ['name'=>'pending', 'bgColor'=>'secondary'],
            ['name'=>'draft', 'bgColor'=>'info'],
        ]; //'completed', 'pending', 'draft'
        return view('backend.property.allProperty', compact('properties', 'allStatus', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function singleProperty (string $id)
    {
        $property = Property::where('id', $id)->first();
        $property_room_furnishes_and_features = $property->property_room_furnishes_and_features ? (array) json_decode($property->property_room_furnishes_and_features) : collect([]);
        $property_accepting = $property->property_accepting ? (array) json_decode($property->property_accepting) : collect([]);
        $property_rooms = $property->property_rooms ? (array) json_decode($property->property_rooms) : collect([]);
        return view('backend.property.singleProperty', compact('property', 'property_accepting', 'property_room_furnishes_and_features', 'property_rooms'));
    }

    public function adminUpdatePropertyStatus(string $id, $status)
    {
        $property = Property::find($id);
        $property->status = $status;
        $property->save();
        return back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminPropertyDelete($id)
    {
        $property = Property::find($id);
        Posting::where('property_id', $id)->delete();
        $property->delete();

        // Set a success message in session flash data
        return back()->with('success', 'Item Removed Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
