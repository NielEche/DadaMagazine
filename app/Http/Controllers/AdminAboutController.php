<?php

namespace App\Http\Controllers;

use App\Models\aboutUs; 
use App\Models\editorNotes; 
use App\Models\teams;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function index()
    {
        // Add your logic here
        $aboutUs = aboutUs::all();
        $editorNotes = editorNotes::all();
        $teams = teams::all();
        
        return view('admin.about', ['aboutUs' => $aboutUs, 'editorNotes' => $editorNotes, 'teams' => $teams]);
    }


    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            // Add more validation rules as needed
        ]);

       

        // Create a new feature record in the database
        teams::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('admin.about')->with('success', 'Team member added successfully');
    }



    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'about' => 'required|string|max:255',
        ]);
    
        // Find the HomeIssue record by ID
        $aboutUs = aboutUs::findOrFail($id);
    
    
        // Update other fields in the record
        $aboutUs->update([
            'about' => $request->input('about'),
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.about')->with('success', 'About updated successfully');
    }



    public function teamupdate(Request $request, $id)
    {
     
        // Find the HomeIssue record by ID
        $teams = teams::findOrFail($id);
    
    
        // Update other fields in the record
        $teams->update([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.about')->with('success', 'Team member updated successfully');
    }


    public function destroyTeam($id)
    {
        $teams = teams::find($id);

        $teams->delete('delete from teams where id = ?',[$id]);
        
        $response = [
            "success" => 'Your team member has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }

    

    public function editorupdate(Request $request, $id)
    {
     
    
        // Find the HomeIssue record by ID
        $editorNotes = editorNotes::findOrFail($id);
    
    
        // Update other fields in the record
        $editorNotes->update([
            'content' => $request->input('content'),
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.about')->with('success', 'Editor note updated successfully');
    }
    
}
