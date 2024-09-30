<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;



class FileUploadController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('file-upload');
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx',
        ]);


        $filePath = $this->handleFileUpload($request, 'file');

        if ($filePath) {
            return redirect()->route('index')->with('success', 'File uploaded successfully!');
        } else {
            return redirect()->route('index')->with('error', 'File upload failed.');
        }
    }
}
