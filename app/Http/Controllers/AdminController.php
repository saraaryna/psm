<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Complaint;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $totalUsers = User::where('role', 'Student')->count();
        $totalProperties = Property::count();
        $totalComplaint = Complaint::count();
        
        $facultyCounts = User::select('faculty', DB::raw('count(*) as total'))
            ->where('role', 'Student')
            ->groupBy('faculty')
            ->pluck('total', 'faculty')
            ->all();

        $complaintsByMonth = Complaint::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as total')
        )
        ->groupBy('month')
        ->pluck('total', 'month')
        ->all();

        return view('Admin.index', [
            'user' => $user,
            'totalUsers' => $totalUsers,
            'totalProperties' => $totalProperties,
            'totalComplaint' => $totalComplaint,
            'facultyCounts' => $facultyCounts,
            'complaintsByMonth' => $complaintsByMonth
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
        $complaints = Complaint::withCountOfReports()->get();
        $allComplaints = Complaint::all();
    
        return view('Admin.complaint', [
            'user' => $user,
            'complaints' => $complaints,
            'allComplaints' => $allComplaints,
        ]);
    }

    public function report(Request $request)
    {
        $user = $request->user();
        $complaint = Complaint::all();
        $property = Property::all();

        $facultyData = $this->getFacultyData();
        $yearData = $this->getYearData();
        return view('Admin.report',[
            'user' => $user,
            'property' => $property,
            'complaint' => $complaint,
            'facultyLabels' => $facultyData['labels'],
            'facultyData' => $facultyData['data'],
            'yearLabels' => $yearData['labels'],
            'yearData' => $yearData['data'],
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
    
    protected function getFacultyData()
    {
        // Fetch users with role 'Student'
        $users = User::where('role', 'Student')->get();
        $facultyCounts = $users->groupBy('faculty')->map(function ($group) {
            return $group->count();
        });

        return [
            'labels' => $facultyCounts->keys()->toArray(),
            'data' => $facultyCounts->values()->toArray(),
        ];
    }

    protected function getYearData()
    {
        // Fetch users with role 'Student'
        $users = User::where('role', 'Student')->get();
        $yearCounts = $users->groupBy('year')->map(function ($group) {
            return $group->count();
        });

        return [
            'labels' => $yearCounts->keys()->toArray(),
            'data' => $yearCounts->values()->toArray(),
        ];
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
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
    
        // Find the existing property by ID
        $property = Property::where('propertyID', $id)->firstOrFail();
            
        // If propertyFurnish is provided, convert it to a string
        if (isset($validatedData['propertyFurnish'])) {
            $propertyFurnish = implode(' | ', $validatedData['propertyFurnish']);
            $validatedData['propertyFurnish'] = $propertyFurnish;
        }
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('propertyImage')) {
            // Store the new image and get the path
            $imagePath = $request->file('propertyImage')->store('banner');
            // Add the new image path to the validated data
            $validatedData['propertyImage'] = $imagePath;
        } else {
            // If no new image is provided, use the existing image
            $validatedData['propertyImage'] = $property->propertyImage;
        }
    
        // Update the property with validated data
        $property->update($validatedData);
    
        // Redirect back to the properties list with a success message
        return redirect('/property-Admin')->with('success', 'Property updated successfully');
    }
}
