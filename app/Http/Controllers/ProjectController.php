<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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

}
