<?php

namespace App\Http\Controllers;

use App\Models\HomeIssue; 
use App\Models\HomeVideos; 
use App\Models\HomeGallerys; 
use App\Models\HomeParallaxs; 
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Image;

class AdminHomeController extends Controller
{
    public function index()
    {
        // Add your logic here
        $homeIssues = HomeIssue::all();
        $homeVideos = HomeVideos::all();
        $homeGallerys = HomeGallerys::all();
        $homeParallaxs = HomeParallaxs::all();
        
        return view('admin.index', ['homeIssues' => $homeIssues, 'homeVideos' => $homeVideos, 'homeGallerys' => $homeGallerys, 'homeParallaxs' => $homeParallaxs]);
    }



    public function storeImage(Request $request)
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
        HomeGallerys::create([
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('admin.dashboard')->with('success', 'Image added successfully');
    }



    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order_url' => 'required|url',
        ]);
    
        // Find the HomeIssue record by ID
        $homeIssue = HomeIssue::findOrFail($id);
    
        // Initialize the $image_url variable
        $image_url = $homeIssue->image_path; // Use the existing image URL by default
    
        // Handle image upload to Cloudinary if a new image is provided
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $image_path = $request->file('image_path')->getRealPath();
            $uploadResult = cloudinary()->upload($image_path);
    
            if ($uploadResult) {
                $image_url = $uploadResult->getSecurePath();
            }
        }
    
        // Update other fields in the record
        $homeIssue->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'order_url' => $request->input('order_url'),
            'image_path' => $image_url,
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.dashboard')->with('success', 'Home Issue updated successfully');
    }
    

    public function updateVideo(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'embed_code' => 'required|string',
            'video_url' => 'required|string',
        ]);
    
        // Find the HomeIssue record by ID
        $homeVideos = HomeVideos::findOrFail($id);
    
    
        // Update other fields in the record
        $homeVideos->update([
            'title' => $request->input('title'),
            'embed_code' => $request->input('embed_code'),
            'video_url' => $request->input('video_url'),
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.dashboard')->with('success', 'Video updated successfully');
    }
    

    public function updateGallery(Request $request, $id)
    {
       
    
        // Find the HomeIssue record by ID
        $homeGallerys = HomeGallerys::findOrFail($id);
    
        // Initialize the $image_url variable
        $image_url = $homeGallerys->image_path; // Use the existing image URL by default
    
        // Handle image upload to Cloudinary if a new image is provided
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $image_path = $request->file('image_path')->getRealPath();
            $uploadResult = cloudinary()->upload($image_path);
    
            if ($uploadResult) {
                $image_url = $uploadResult->getSecurePath();
            }
        }
    
        // Update other fields in the record
        $homeGallerys->update([
            'image_path' => $image_url,
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.dashboard')->with('success', 'Gallery updated successfully');
    }


    public function updateParallax(Request $request, $id)
    {
       
    
        // Find the HomeIssue record by ID
        $homeParallaxs = HomeParallaxs::findOrFail($id);
    
        // Initialize the $image_url variable
        $image_url = $homeParallaxs->image_path; // Use the existing image URL by default
    
        // Handle image upload to Cloudinary if a new image is provided
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $image_path = $request->file('image_path')->getRealPath();
            $uploadResult = cloudinary()->upload($image_path);
    
            if ($uploadResult) {
                $image_url = $uploadResult->getSecurePath();
            }
        }
    
        // Update other fields in the record
        $homeParallaxs->update([
            'caption' => $request->input('caption'),
            'image_path' => $image_url,
            // Add other fields as needed
        ]);
    
        // Redirect or return a response as needed
        return redirect()->route('admin.dashboard')->with('success', 'Parallax updated successfully');
    }



    public function destroyGallery($id)
    {
        $HomeGallerys = HomeGallerys::find($id);

        $HomeGallerys->delete('delete from HomeGallerys where id = ?',[$id]);
        
        $response = [
            "success" => 'Your gallery Image has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }

}
