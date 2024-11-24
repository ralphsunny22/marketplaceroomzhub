<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posting;
use App\Models\Seeker;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allSeeker($status="")
    {
        $seekers = Seeker::all();
        if ($status=="") {
            $status = 'All';
            $seekers = Seeker::all();
        } else {
            $seekers = Seeker::where('status', $status)->get();
        }

        $allStatus = [
            ['name'=>'featured', 'bgColor'=>'success'],
            ['name'=>'completed', 'bgColor'=>'primary'],
            ['name'=>'pending', 'bgColor'=>'secondary'],
            ['name'=>'draft', 'bgColor'=>'info'],
        ]; //'completed', 'pending', 'draft'
        return view('backend.seeker.allSeeker', compact('seekers', 'allStatus', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function singleSeeker (string $id)
    {
        $seeker = Seeker::where('id', $id)->first();
        $seeker_lifestyle_choices = $seeker->seeker_lifestyle_choices ? (array) json_decode($seeker->seeker_lifestyle_choices) : collect([]);
        $seeker_secondary_work_details = $seeker->seeker_secondary_work_details ? (array) json_decode($seeker->seeker_secondary_work_details) : collect([]);
        $seeker_group = $seeker->seeker_group ? (array) json_decode($seeker->seeker_group) : collect([]);
        $seeker_preferred_locations = $seeker->seeker_preferred_locations ? (array) json_decode($seeker->seeker_preferred_locations) : collect([]);
        return view('backend.seeker.singleSeeker',
        compact('seeker', 'seeker_lifestyle_choices', 'seeker_secondary_work_details', 'seeker_group', 'seeker_preferred_locations'));
    }

    public function adminUpdateSeekerStatus(string $id, $status)
    {
        $seeker = Seeker::find($id);
        $seeker->status = $status;
        $seeker->save();
        return back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminSeekerDelete($id)
    {
        $seeker = Seeker::find($id);
        Posting::where('seeker_id', $id)->delete();
        $seeker->delete();

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
