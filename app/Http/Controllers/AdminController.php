<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Complaint;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $totalUsers = User::where('role', 'Student')->count();
        $totalProperties = Property::count();
        $totalComplaint = Complaint::count();
        
        return view('Admin.index', [
            'user' => $user,
            'totalUsers' => $totalUsers,
            'totalProperties' => $totalProperties,
            'totalComplaint' => $totalComplaint
        ]);
    }



    public function viewProperty(Request $request)
    {
        $user = $request->user();
        $property = Property::all();
        return view('Admin.property',[
            'user' => $user,
            'property' => $property
        ]);
    }

    public function viewUser(Request $request)
    {
        $user = $request->user();
        $user = User::all();
        $property = Property::all();
        return view('Admin.user',[
            'user' => $user,
            'property' => $property
        ]);
    }

    public function showUser(Request $request, $id)
    {
        $user = $request->user();
        $user = User::where('id', $id)->firstOrFail();
        $rental_house = $user->rentalHouse()->first();
    
        return view('Admin.viewUser', [
            'user' => $user,
            'rental_house' => $rental_house, 
        ]);
    }
    

    public function complaint(Request $request)
    {
        $user = $request->user();
        $complaint = Complaint::all();
        $property = Property::all();
        return view('Admin.complaint',[
            'user' => $user,
            'property' => $property,
            'complaint' => $complaint
        ]);
    }

    public function report(Request $request)
    {
        $user = $request->user();
        $complaint = Complaint::all();
        $property = Property::all();
        return view('Admin.report',[
            'user' => $user,
            'property' => $property,
            'complaint' => $complaint
        ]);
    }


    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'propertyName' => 'required|string',
            'propertyType' => 'nullable|string',
            'propertyAddress' => 'nullable|string',
            'city' => 'nullable|string',
            'poscode' => 'nullable|string',
            'state' => 'nullable|string',
            'noPeople' => 'nullable|string',
            'bedroom' => 'nullable|string',
            'bathroom' => 'nullable|string',
            'gender' => 'nullable|string',
            'race' => 'nullable|string',
            'propertyFurnish' => 'nullable|array', 
            'propertyFurnish.*' => 'string', 
            'propertyImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'propertyRentPrice' => 'nullable|string',
            'propertyDesc' => 'nullable|string',
            'ownerPhoneNo' => 'nullable|string',
        ]);
    
        $propertyFurnish = implode(' | ', $validatedData['propertyFurnish']);
        $validatedData['propertyFurnish'] = $propertyFurnish;
    
        $imagePath = null;
        if ($request->hasFile('propertyImage')) {
            $imagePath = $request->file('propertyImage')->store('banner');
        }
            $validatedData['propertyImage'] = $imagePath;
    
        $property = Property::create($validatedData);
    
        return redirect('/property-Admin')->with('success', 'Property added successfully');
    }
    
    public function showProperty(Request $request, $id)
    {
        $user = $request->user();
        $property = Property::where('propertyID', $id)->firstOrFail();
        return view('Admin.viewProperty', [
            'user' => $user,
            'property' => $property
        ]);
    }
    
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        //
    }
}
