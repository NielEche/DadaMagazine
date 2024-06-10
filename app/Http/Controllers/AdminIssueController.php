<?php

namespace App\Http\Controllers;
use App\Models\issues; 
use App\Models\issuesImages; 
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Uploader;
use Image;

class AdminIssueController extends Controller
{
    public function index()
    {
        // Add your logic here
        $issues = issues::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.issues', ['issues' => $issues]);
    }



    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'published' => 'required|string',
            'featuring' => 'required|string',
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

        // Create a new feature record in the database
        issues::create([
            'title' => $request->input('title'),
            'published' => $request->input('published'),
            'featuring' => $request->input('featuring'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('admin.issues')->with('success', 'Issue added successfully');
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
        issuesImages::create([
            'issue_id' => $request->input('issue_id'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        // Redirect to a success page or back to the form
        return redirect()->route('issues.edit', ['id' => $request->input('issue_id')])->with('success', 'Issue added successfully');
    }



    public function edit($id)
    {
        $issues = issues::find($id);
    
        if (!$issues) {
            return redirect()->route('admin.issues')->with('error', 'Issue not found');
        }
    
        $issuesImages = issuesImages::where('issue_id', $id)->get();
    
        return view('admin.issuesEdit', compact('issues', 'issuesImages'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'published' => 'required|string',
            'featuring' => 'required|string',
            // Add more validation rules as needed
        ]);

         // Find the HomeIssue record by ID
         $issues = issues::findOrFail($id);
    
         // Initialize the $image_url variable
         $image_url = $issues->image_path; // Use the existing image URL by default
     
         // Handle image upload to Cloudinary if a new image is provided
         if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
             $image_path = $request->file('image_path')->getRealPath();
             $uploadResult = cloudinary()->upload($image_path);
     
             if ($uploadResult) {
                 $image_url = $uploadResult->getSecurePath();
             }
         }

        $issues->update([
            'title' => $request->input('title'),
            'published' => $request->input('published'),
            'featuring' => $request->input('featuring'),
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        return redirect()->route('issues.edit', ['id' => $issues->id])->with('success', 'Issue updated successfully');
    }



    public function updateImages(Request $request, $id)
    {
       
         // Find the HomeIssue record by ID
         $issuesImages = issuesImages::findOrFail($id);
    
         // Initialize the $image_url variable
         $image_url = $issuesImages->image_path; // Use the existing image URL by default
     
         // Handle image upload to Cloudinary if a new image is provided
         if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
             $image_path = $request->file('image_path')->getRealPath();
             $uploadResult = cloudinary()->upload($image_path);
     
             if ($uploadResult) {
                 $image_url = $uploadResult->getSecurePath();
             }
         }

        $issuesImages->update([
            'image_path' => $image_url,
            // Add more fields as needed
        ]);

        return redirect()->route('issues.edit', ['id' => $issuesImages->id])->with('success', 'Issue Image updated successfully');
    }



    public function destroy($id)
    {
        $issues = issues::find($id);

        $issues->delete('delete from issuesImages where id = ?',[$id]);
        
        $response = [
            "success" => 'Feature has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }


    public function destroyImage($id)
    {
        $issuesImages = issuesImages::find($id);

        $issuesImages->delete('delete from issuesImages where id = ?',[$id]);
        
        $response = [
            "success" => 'Your Issue Image has been Deleted Successfully'
        ];
        
        return redirect()->back()->with($response );
    }

}
