<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Complaint;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\RentalHouse;
use App\Models\User;

class StudentController extends Controller
{
   
    public function index(Request $request)
    {
        $user = $request->user();
        // $rental_house = $user->rentalHouse; // Assuming a user has one rental house
        return view('Student.index',[
            'user' => $user,
            // 'rental_house' => $rental_house,
        ]);
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('Student.profile',[
            'user' => $user,
        ]);
    }

    public function property(Request $request)
    {
        $user = $request->user();
        $property = Property::all();
        $complaints = Complaint::withCountOfReports()->get();
        return view('Student.property',[
            'user' => $user,
            'property' => $property,
            'complaints' => $complaints,

        ]);
    }

    public function showPropertyStud(Request $request, $id)
    {
        $user = $request->user();
        $property = Property::where('propertyID', $id)->firstOrFail();
        // $property = Property::with('complaints')->findOrFail($id);
        return view('Student.viewProperty', [
            'user' => $user,
            'property' => $property,



        ]);
    }
    
    public function complaint(Request $request)
    {
        $user = $request->user();
        $complaints = Complaint::withCountOfReports()->get();
        $allComplaints = Complaint::all();
    
        return view('Student.complaint', [
            'user' => $user,
            'complaints' => $complaints,
            'allComplaints' => $allComplaints,
        ]);
    }
    

    
    public function accommodation(Request $request)
    {
        $user = $request->user();
        $rental_house = RentalHouse::where('userID', $user->id)->first(); // Assuming userID is the foreign key in the rental_house table
    
        return view('Student.accommodation', [
            'user' => $user,
            'rental_house' => $rental_house,
        ]);
    }
    
    public function store(Request $request)
    {
        // Check if the user already has a rental house record
        $rental_house = RentalHouse::where('userID', auth()->id())->first();
    
        if ($rental_house) {
            // Update the existing rental house record
            $rental_house->update($request->all());
            $message = 'Accommodation updated successfully';
        } else {
            // Create a new rental house record using the request data
            $rental_house = new RentalHouse;
            $rental_house->sem = $request->sem;
            $rental_house->session = $request->session;
            $rental_house->people = $request->people;
            $rental_house->accoType = $request->accoType;
            $rental_house->accoAddress = $request->address;
            $rental_house->accoCity = $request->city;
            $rental_house->accoPoscode = $request->poscode;
            $rental_house->accoState = $request->state;
            $rental_house->emergencyContactNo = $request->contactNo;
            $rental_house->userID = auth()->id();
            $rental_house->save();
    
            $message = 'Accommodation added successfully';
        }
    
        // Redirect the user to the accommodation route
        return redirect('/accommodation')->with('success', $message);
    }
    

    public function updateAccommodation(Request $request, $id)
    {
        // Find the rental house record by its ID
        $rental_house = RentalHouse::findOrFail($id);
    
        // Update the rental house record with the request data
        $rental_house->sem = $request->sem;
        $rental_house->session = $request->session;
        $rental_house->people = $request->people;
        $rental_house->accoType = $request->accoType;
        $rental_house->accoAddress = $request->address;
        $rental_house->accoCity = $request->city;
        $rental_house->accoPoscode = $request->poscode;
        $rental_house->accoState = $request->state;
        $rental_house->emergencyContactNo = $request->contactNo;
        $rental_house->save();
    
        // Redirect the user to the accommodation route
        return redirect('/accommodation')->with('success', 'Accommodation updated successfully');
    }
    

    
    public function storeComplaint(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'landlordPhoneNo' => 'required|string|max:255',
            'complaintDesc' => 'required|string|max:255',
            'complaintImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Handle file upload
        if ($request->hasFile('complaintImage')) {
            $imagePath = $request->file('complaintImage')->store('banner'); // Change 'complaint_images' to 'banner'
            $validatedData['complaintImage'] = $imagePath;
        }
    
        // Create a new Complaint instance with the validated data
        $complaint = new Complaint;
        $complaint->landlordPhoneNo = $validatedData['landlordPhoneNo'];
        $complaint->complaintDesc = $validatedData['complaintDesc'];
        $complaint->complaintImage = $validatedData['complaintImage'] ?? null; // If no image uploaded, set to null
    
        // Save the complaint to the database
        $complaint->save();
    
        return redirect('/complaint')->with('success', 'Complaint added successfully');
    }
    
     
    
    public function update(Request $request, $id)
    {
            // dd($request->all());
            $user = User::findOrFail($id);

        $this->validate($request, [
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->program = $request->program;
        $user->year = $request->year;
    
        $user->save();
    
        return redirect()->route('profile');
    }


        
    public function search(Request $request)
    {
        $user = $request->user();
        $searchedPhoneNo = $request->input('phoneNo');
        $totalCount = null;
    
        if ($searchedPhoneNo) {
            $totalCount = Complaint::where('landlordPhoneNo', $searchedPhoneNo)->count();
        }
    
        return view('Student.searchScammer', [
            'user' => $user,
            'searchedPhoneNo' => $searchedPhoneNo,
            'totalCount' => $totalCount,
            'showModal' => isset($searchedPhoneNo)
        ]);
    }
    

    
    
    
    
    
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
    
        return redirect()->back()->with('success', 'Complaint deleted successfully');
    }


    
    
}
