<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * This constructor allows us to create a private variable, which is our repository.
     */
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

    public function index()
    {
        $projects = $this->projectRepository->all(); // We call the previously created method to fetch our projects from the database.

        return view('projects') // Same name as the view which is in views directory without the extension .blade.php
            ->with('projects', $projects); // The first parameter stands for the variable name in the blade view. The second one is the variable itself.
    }
}
