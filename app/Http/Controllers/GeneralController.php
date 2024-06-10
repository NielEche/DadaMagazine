<?php

namespace App\Http\Controllers;

use App\Models\HomeGallerys; 
use App\Models\HomeIssue; 
use App\Models\HomeVideos; 
use App\Models\features; 
use App\Models\issues;
use App\Models\featuresImages; 
use App\Models\issuesImages; 
use App\Models\clubUpdates; 

use App\Models\aboutUs; 
use App\Models\editorNotes; 
use App\Models\teams;

use Illuminate\Http\Request;


class GeneralController extends Controller
{

    public function index()
    {
        $sliderItems = HomeGallerys::all();
        $homeIssues = HomeIssue::all();
        $homeVideos = HomeVideos::all();
        $features = features::orderBy('created_at', 'desc')->paginate(2);

        return view('index', ['sliderItems' => $sliderItems, 'homeIssues' => $homeIssues, 'homeVideos' => $homeVideos,  'features' => $features]);
    }


    public function features()
    {
        $homeVideos = HomeVideos::all();
        $features = features::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.features', [ 'homeVideos' => $homeVideos,  'features' => $features]);


    }

  
    public function stories()
    {

        $homeVideos = HomeVideos::all();
        $features = features::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.stories', [ 'homeVideos' => $homeVideos,  'features' => $features]);
    }


     
    public function shop()
    {

        $shopUpdates = clubUpdates::orderBy('created_at', 'desc')->get();

        return view('pages.shop', [ 'shopUpdates' => $shopUpdates]);
    }



    public function editS($id)
    {
        $features = features::find($id);
    
        if (!$features) {
            return redirect()->route('pages.stories')->with('error', 'Story not found');
        }
    
        $featuresImages = featuresImages::where('feature_id', $id)->get();
    
        return view('pages.singles', compact('features', 'featuresImages'));
    }



    public function editI($id)
    {
        $issues = issues::find($id);
    
        if (!$issues) {
            return redirect()->route('admin.feature')->with('error', 'Feature not found');
        }
    
        $issuesImages = issuesImages::where('issue_id', $id)->get();
    
        return view('pages.singleissue', compact('issues', 'issuesImages'));
    }


   

    public function issues()
    {
        $issues = issues::orderBy('created_at', 'desc')->get(); // Assuming your model is named 'Issue' and 'issues' table
        $issuesImages = issuesImages::orderBy('created_at', 'desc')->get(); // Assuming your model is named 'IssueImage' and 'issues_images' table

        // Group issuesImages by issues_id
        $groupedImages = $issuesImages->groupBy('issue_id');

        return view('pages.issues', ['issues' => $issues, 'groupedImages' => $groupedImages]);
    }







    public function about()
    {
        $aboutUs = aboutUs::all();
        $editorNotes = editorNotes::all();
        $teams = teams::all();

        return view('pages.about', ['aboutUs' => $aboutUs, 'editorNotes' => $editorNotes, 'teams' => $teams, ]);
    }


}
