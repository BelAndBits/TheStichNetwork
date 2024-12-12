<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pattern;
use App\Models\Resource;
use App\Models\Image;
use App\Models\PdfFile;
use App\Models\Type_Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::all();
        return view('patterns.index', ['patterns' => $patterns]);
    }
    public function create()
    {
        return view('patterns.create');
    }

    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'materials' => 'required',
            'base_price' => 'required|numeric',
            'images.*' => 'image',
            'pdf_file' => 'required|file|mimes:pdf'
        ]);
        $user = Auth::user();  // Get the currently authenticated user

        // Create the pattern including library_id
        $pattern = new Pattern([
            'library_id' => $user->library->library_id, // Assuming each user has one library and it's accessible like this
            'name' => $request->name,
            'description' => $request->description,
            'materials' => $request->materials,
            'base_price' => $request->base_price,
            'status' => 'available', // Assume all new patterns are available
            'add_date' => now(), 
            'upload_date' => now(),
        ]);
        $pattern->save();
    

        // Handle the upload of images
        if ($request->hasFile('images')) {
            $resource = new Resource([
                'pattern_id' => $pattern-> pattern_id,
                'is_public' => true
            ]);

            $resource->save();

            Type_Resource::create([
                'resource_id' => $resource -> resource_id,
                'is_image' => true,
                'is_pdf' => false,
            ]);

    
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                Image::create([
                    'pattern_id' => $pattern->id,
                    'path' => $path,
                    'main_image' => false // Define how the main image is chosen
                ]);
            }
        }

        // Upload the PDF file
        if ($request->hasFile('pdf_file')) {
            $resource = new Resource([
                'pattern_id' => $pattern-> pattern_id,
                'is_public' => true
            ]);

            $resource->save();

            Type_Resource::create([
                'resource_id' => $resource -> resource_id,
                'is_image' => false,
                'is_pdf' => true,
            ]);

            $pdfPath = $request->file('pdf_file')->store('public/pdf_files');
            PdfFile::create([
                'pattern_id' => $pattern->id,
                'path' => $pdfPath
            ]);
        }

        // Assign the designer role if the user doesn't already have it
        $user = Auth::user();
        if (!$user->hasRole('designer')) {
            $user->assignRole('designer');
        }

        // Redirect to the patterns index page with a success message
        return redirect()->route('patterns.index')->with('success', 'Pattern created successfully.');
    }

    public function getPatternsWithMainImage()
    {
        $patterns = Pattern::with(['resources.images' => function ($query) {
            $query->where('main_image', true);
        }])->get();

        return $patterns;
    }
}
