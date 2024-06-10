<?php

namespace App\Http\Controllers;
use App\Models\features; 
use App\Models\featuresImages;
use App\Models\featuresVideos; 
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Image;

class AdminFeatureController extends Controller
{
    public function index()
    {
        // Add your logic here
        $tags = features::distinct('tags')->pluck('tags')->filter();
        $features = features::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.features', ['features' => $features, 'tags' => $tags]);
    }



    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'credit' => 'required|string',
            // Add more validation rules as needed
        ]);

        $image_url = $request->file('image_path');
    
        // Handle image upload to Cloudinary if a new image is provided
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $image_path = $request->file('image_path')->getRealPath();
            $uploadResult = cloudinary()->upload($image_path);
    
            if ($uploadResult) {
                $image_url = $uploadResult->getSecurePath();
            }
        }


       // $selectedTag = $request->input('tags');
     //   $newTag = $request->input('new_tag');
    
        // Determine the tag to save
        //$tagToSave = null;
    
      //  if (!is_null($selectedTag)) {
           // $tagToSave = $selectedTag;
     //   } elseif (!is_null($newTag)) {
          //  $tagToSave = $newTag;
     //   }

        // Create a new feature record in the database
        features::create([
            'title' => $request->input('title'),
            'credit' => $request->input('credit'),
            'caption' => 'null',
            'content' => $request->input('content'),
            'tags' => 'null',
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('admin.feature')->with('success', 'Story added successfully');
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
        featuresImages::create([
            'feature_id' => $request->input('feature_id'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('features.edit', ['id' => $request->input('feature_id')])->with('success', 'Story added successfully');
    }



    public function storeVideos(Request $request)
    {
        // Create a new feature record in the database
        featuresVideos::create([
            'feature_id' => $request->input('feature_id'),
            'video_path' => $request->input('video_path'),

            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('features.edit', ['id' => $request->input('feature_id')])->with('success', 'Story added successfully');
    }



    public function edit($id)
    {
        $features = features::find($id);
    
        if (!$features) {
            return redirect()->route('admin.feature')->with('error', 'Feature not found');
        }
    
        $featuresImages = featuresImages::where('feature_id', $id)->get();

        $featuresVideos = featuresVideos::where('feature_id', $id)->get();
    
        return view('admin.featureEdit', compact('features', 'featuresImages', 'featuresVideos'));
    }


    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'credit' => 'required|string',
            // Add more validation rules as needed
        ]);

         // Find the HomeIssue record by ID
         $features = features::findOrFail($id);
    
         // Initialize the $image_url variable
         $image_url = $features->image_path; // Use the existing image URL by default
     
         // Handle image upload to Cloudinary if a new image is provided
         if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
             $image_path = $request->file('image_path')->getRealPath();
             $uploadResult = cloudinary()->upload($image_path);
     
             if ($uploadResult) {
                 $image_url = $uploadResult->getSecurePath();
             }
         }

        $features->update([
            'title' => $request->input('title'),
            'credit' => $request->input('credit'),
            'caption' =>  'null',
            'content' => $request->input('content'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        return redirect()->route('features.edit', ['id' => $features->id])->with('success', 'Feature updated successfully');
    }


    public function updateImages(Request $request, $id)
    {
       
         // Find the HomeIssue record by ID
         $featuresImages = featuresImages::findOrFail($id);
    
         // Initialize the $image_url variable
         $image_url = $featuresImages->image_path; // Use the existing image URL by default
     
         // Handle image upload to Cloudinary if a new image is provided
         if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
             $image_path = $request->file('image_path')->getRealPath();
             $uploadResult = cloudinary()->upload($image_path);
     
             if ($uploadResult) {
                 $image_url = $uploadResult->getSecurePath();
             }
         }

        $featuresImages->update([
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        return redirect()->route('features.edit', ['id' => $featuresImages->id])->with('success', 'Feature Image updated successfully');
    }





    public function updateVideos(Request $request, $id)
    {
    
         // Find the HomeIssue record by ID
         $featuresVideos = featuresVideos::findOrFail($id);
    
        $featuresVideos->update([
            'video_path' => $request->input('video_path'),
          
            // Add more fields as needed
        ]);

        return redirect()->route('features.edit', ['id' => $features->id])->with('success', 'Feature Video updated successfully');
    }



    public function destroy($id)
    {
        $features = features::find($id);

        $features->delete('delete from events where id = ?',[$id]);
        
        $response = [
            "success" => 'Story has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }


    public function destroyImage($id)
    {
        $featuresImages = featuresImages::find($id);

        $featuresImages->delete('delete from events where id = ?',[$id]);
        
        $response = [
            "success" => 'Your Issue Image has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }


    public function destroyVideo($id)
    {
        $featuresVideos = featuresVideos::find($id);

        $featuresVideos->delete('delete from featuresVideos where id = ?',[$id]);
        
        $response = [
            "success" => 'Your featuresVideos Image has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }

}
