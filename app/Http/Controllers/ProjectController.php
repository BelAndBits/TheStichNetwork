<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Library;
use App\Models\Resource;
use App\Models\Image;
use Carbon\Carbon;

class ProjectController extends Controller
{
    
    //Constructor to allow the creation of a private variable (the repository)
    public function __construct(private Project $projectRepository)
    {

    }

    public function all(): array
    {
        return Project::all()->all();
    }   


    public function index()
    {
        
        $user_id = Auth::id(); 
        $projects = Project::with('images') 
        ->where('library_id', function($query) use ($user_id) {
            $query->select('library_id')
                  ->from('libraries')
                  ->where('user_id', $user_id)
                  ->first();
        })->get();

    return view('projects.index')->with('projects', $projects);
    }

    public function create()
    {
        //Here to add future lit of pattern 
        return view('projects.create');
    }

    public function store(Request $request)
    {

        $user = Auth::user()->toArray();
        $library = Library::where('user_id', $user['user_id'])->first()->toArray();
  
        // Check and validate form
        $validated = $request->validate([
            'craft' => 'required',
            'project_name' => 'required',
            'pattern' => 'required'
        ]);
        
        // Create project
        $project = Project::create([
            'library_id' => $library['library_id'],
            'creation_date' => Carbon::now(),
            'name' => $request->project_name,
            'craft' => $request->craft,
            'pattern' => $request->pattern,
            
        ]);

        // Ensure $project was created
        if (!$project) {
            return back()->withErrors(['error' => 'Failed to create project.']);
        }

        $resource = Resource::create([
            'project_id' => $project->project_id,
            'is_public' => true
        ]);

        // Ensure $resource was created
        if (!$resource) {
            return back()->withErrors(['error' => 'Failed to create resource.']);
        }

        $iconPath = $this->determineIconPath($request->craft);
        Image::create([
            'resource_id' => $resource->resource_id,
            'path' => $iconPath,
            'main_image' => true,
            'order' => 1
        ]);
        
        // Redirect o show happy message
        return redirect()->route('my-library')->with('success', 'Project created successfully!');
    }

        protected function determineIconPath($craft)
    {
        $icons = [
            'crochet' => 'images/crochet-icon.png',
            'cross-stitch' => 'images/cross-stitch-icon.png',
            'embroidery' => 'images/embroidery-icon.png',
            'knitting' => 'images/knitting-icon.png',
            'sewing' => 'images/sewing-icon.png',
        ];

        return $icons[strtolower($craft)] ?? 'images/default-icon.png'; // default icon if craft not matched
    }

    public function allProjects()
    {
        $projects = Project::all(); 
        return view('projects', compact('projects'));
    }

    public function showAllProjects()
    {
        $projects = Project::with(['resources.images' => function($query) {
            $query->where('main_image', true); 
        }])->get();

 
        return view('projects', compact('projects'));
    }


}
