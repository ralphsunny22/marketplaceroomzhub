<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seeker;
use App\Models\Property;
use App\Models\Posting;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. //////
     */
    //////
    public function allUser($list_type="")
    {
        $properties = User::all();
        if ($list_type=="") {
            $list_type = 'All';
            $users = User::all();
        }
        if($list_type=="seeker") {
            $userIds = Seeker::select('created_by')->pluck('created_by');
            $users = User::whereIn('id',$userIds)->get();
        }
        if($list_type=="property") {
            $userIds = Property::select('created_by')->pluck('created_by');
            $users = User::whereIn('id',$userIds)->get();
        }

        $allStatus = [
            ['name'=>'active', 'bgColor'=>'success'],
            ['name'=>'inactive', 'bgColor'=>'danger'],
        ]; //'completed', 'pending', 'draft'
        return view('backend.user.allUser', compact('users', 'allStatus', 'list_type'));
    }

    public function singleUser (string $id)
    {
        $user = User::find($id);

        $properties = $user->properties;

        $seeker = Seeker::where('created_by', $user->id)->first();
        $seeker_lifestyle_choices = $seeker?->seeker_lifestyle_choices ? (array) json_decode($seeker->seeker_lifestyle_choices) : collect([]);
        $seeker_secondary_work_details = $seeker?->seeker_secondary_work_details ? (array) json_decode($seeker->seeker_secondary_work_details) : collect([]);
        $seeker_group = $seeker?->seeker_group ? (array) json_decode($seeker->seeker_group) : collect([]);
        $seeker_preferred_locations = $seeker?->seeker_preferred_locations ? (array) json_decode($seeker->seeker_preferred_locations) : collect([]);
        return view('backend.user.singleUser',
        compact('user', 'seeker', 'seeker_lifestyle_choices', 'seeker_secondary_work_details', 'seeker_group', 'seeker_preferred_locations'));
    }

    public function userAllProperty($user_id, $status="")
    {
        $user = User::find($user_id);
        $properties = $user->properties;

        if ($status=="") {
            $status = 'All';
            $properties = $properties;
        } else {
            $properties = $user->properties()->where('status', $status)->get();
        }

        $allStatus = [
            ['name'=>'featured', 'bgColor'=>'success'],
            ['name'=>'completed', 'bgColor'=>'primary'],
            ['name'=>'pending', 'bgColor'=>'secondary'],
            ['name'=>'draft', 'bgColor'=>'info'],
        ]; //'completed', 'pending', 'draft'

        return view('backend.user.userAllProperty', compact('user', 'properties', 'allStatus', 'status'));
    }

    public function adminUpdateUserStatus(string $id, $status)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return back()->with('success', 'Status Updated Successfully!');
    }


    public function adminUserDelete($id)
    {
        $user = User::find($id);
        User::where('id', $id)->delete();
        Property::where('created_by', $id)->delete();
        Posting::where('created_by', $id)->delete();
        $user->delete();

        // Set a success message in session flash data
        return back()->with('success', 'User Removed Successfully!');
    }

    /**
     * Store a newly created resource in storage.//
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
