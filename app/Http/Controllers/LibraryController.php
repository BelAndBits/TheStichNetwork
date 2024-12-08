<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Library;
use App\Models\Resource;
use App\Models\Image;
use Carbon\Carbon;

class LibraryController extends Controller
{
     /**
     * Display the library page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $projects = Project::with(['resources.mainImage']) 
                            ->whereHas('library', function ($query) use ($user_id) {
                                $query->where('user_id', $user_id);
                            })
                            ->get();

        return view('my-library', ['projects' => $projects]);
    }

}
