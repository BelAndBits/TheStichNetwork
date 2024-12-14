<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pattern;
use App\Models\Resource;
use App\Models\Image;
use App\Models\PdfFile;
use App\Models\TypeResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::with(['resources.images' => function($query) {
            $query->where('main_image', true); 
        }])->get();

        return view('patterns.index', compact('patterns'));
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
            'user_id' => $user->user_id, 
            'name' => $request->name,
            'description' => $request->description,
            'materials' => $request->materials,
            'base_price' => $request->base_price,
            'status' => 'available', 
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

            TypeResource::create([
                'resource_id' => $resource -> resource_id,
                'is_image' => true,
                'is_pdf' => false,
            ]);

            $mainImageName = $request->input('main_image');

            $counter = 1; //Initialize counter
    
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $isMainImage = ($image->getClientOriginalName() == $mainImageName);
                Image::create([
                    'resource_id' => $resource -> resource_id,
                    'pattern_id' => $pattern->pattern_id,
                    'path' => $path,
                    'main_image' => $isMainImage, 
                    'order' => $counter
                ]);
                $counter++;
            }
        }

        // Upload the PDF file
        if ($request->hasFile('pdf_file')) {
            $resource = new Resource([
                'pattern_id' => $pattern-> pattern_id,
                'is_public' => true
            ]);
                      
            $resource->save();

            TypeResource::create([
                'resource_id' => $resource -> resource_id,
                'is_image' => false,
                'is_pdf' => true,
            ]);

            $pdfPath = $request->file('pdf_file')->store('public/pdf_files');
            
            PdfFile::create([
                'resource_id' => $resource -> resource_id,
                'path' => $pdfPath
            ]);
        }

        // Assign the designer role if the user doesn't already have it
        // $user = Auth::user();
        // if (!$user->hasRole('designer')) {
        //     $user->assignRole('designer');
        // }

        // Redirect to the patterns index page with a success message
        return redirect()->route('patterns.index')->with('success', 'Pattern created successfully.');
    }

    public function show(Pattern $pattern)
    {
        return view('patterns.show', compact('pattern'));
    }

}
