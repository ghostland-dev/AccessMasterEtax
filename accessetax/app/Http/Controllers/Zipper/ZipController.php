<?php

namespace App\Http\Controllers\Zipper;

use App\Http\Controllers\Controller;
use App\Models\BaseDocument;
use Illuminate\Http\Request;
use ZipArchive;

class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // Find the BaseDocument by ID
        $baseDocument = BaseDocument::find(1);

        // Create a new ZipArchive instance
        $zip = new ZipArchive;

        // Generate a unique filename for the zip file
        $zipFileName = 'base_document_' . $baseDocument->id . '_' . time() . '.zip';

        // Path to save the zip file
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        // Open the zip file for writing
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // Loop through each file attribute of the BaseDocument model
            foreach ($baseDocument->getAttributes() as $attribute) {
                // Check if the attribute is a file URL
                if (filter_var($attribute, FILTER_VALIDATE_URL)) {
                    // Get the file name from the URL
                    $fileName = pathinfo($attribute, PATHINFO_FILENAME);

                    // Download the file content
                    $fileContent = file_get_contents($attribute);

                    // Add the file to the zip archive
                    $zip->addFromString($fileName, $fileContent);
                }
            }

            // Close the zip archive
            $zip->close();

            // Provide the zip file for download
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        // Return a response if there was an error creating the zip file
        return response()->json(['message' => 'Failed to create the zip file.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
