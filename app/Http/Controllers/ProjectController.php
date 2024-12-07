<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Library;
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
        
        $projects = $this->all(); // We call the previously created method to fetch our projects from the database.

        return view('projects') 
            ->with('projects', $projects); // The first parameter stands for the variable name in the blade view. The second one is the variable itself.
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
        Project::create([
            'library_id' => $library['library_id'],
            'creation_date' => Carbon::now(),
            'name' => $request->project_name,
            'craft' => $request->craft,
            'pattern' => $request->pattern,
            
        ]);

        // Redirect o show happy message
        return redirect('/some-route')->with('status', 'Project created successfully!');
    }

}
