<?php

namespace App\Http\Controllers;
use App\Models\clubUpdates; 
use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Image;

use Illuminate\Http\Request;

class AdminClubController extends Controller
{
    public function index()
    {
        // Add your logic here
        $clubUpdates = clubUpdates::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.club', ['clubUpdates' => $clubUpdates]);
    }


    public function store(Request $request)
    {
      

        $image_url = $request->file('image_path');
    
        // Handle image upload to Cloudinary if a new image is provided
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $image_path = $request->file('image_path')->getRealPath();
            $uploadResult = cloudinary()->upload($image_path);
    
            if ($uploadResult) {
                $image_url = $uploadResult->getSecurePath();
            }
        }

        // Create a new feature record in the database
        clubUpdates::create([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'text' => $request->input('text'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('admin.club')->with('success', 'Update added successfully');
    }


    public function edit($id)
    {
        $clubUpdates = clubUpdates::find($id);
    
        if (!$clubUpdates) {
            return redirect()->route('admin.club')->with('error', 'Update not found');
        }
    
    
        return view('admin.clubEdit', compact('clubUpdates'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            // Add more validation rules as needed
        ]);

         // Find the HomeIssue record by ID
         $clubUpdates = clubUpdates::findOrFail($id);
    
         // Initialize the $image_url variable
         $image_url = $clubUpdates->image_path; // Use the existing image URL by default
     
         // Handle image upload to Cloudinary if a new image is provided
         if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
             $image_path = $request->file('image_path')->getRealPath();
             $uploadResult = cloudinary()->upload($image_path);
     
             if ($uploadResult) {
                 $image_url = $uploadResult->getSecurePath();
             }
         }

        $clubUpdates->update([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'text' => $request->input('text'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        return redirect()->route('clubUpdates.edit', ['id' => $clubUpdates->id])->with('success', 'club updated successfully');
    }
    



    public function destroy($id)
    {
        $clubUpdates = clubUpdates::find($id);

        $clubUpdates->delete('delete from clubUpdates where id = ?',[$id]);
        
        $response = [
            "success" => 'Update has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }


}
