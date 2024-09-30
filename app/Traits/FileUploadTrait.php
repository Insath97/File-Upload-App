<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

trait FileUploadTrait
{
    public function handleFileUpload(Request $request, string $fieldName, ?string $oldPath = null, string $desktopFolder = 'uploads'): ?string
    {
        // Check request for file
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        // Check old path and delete old file
        if ($oldPath && File::exists(public_path($oldPath))) {
            File::delete(public_path($oldPath));
        }

        // Get the uploaded file
        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();
        $updatedFileName = Str::random(30) . '.' . $extension;

        // Get the desktop path from environment variable
        $desktopPath = env('DESKTOP_PATH') . '/' . $desktopFolder;

        // Ensure the directory exists; if not, create it
        if (!File::exists($desktopPath)) {
            File::makeDirectory($desktopPath, 0755, true);
        }

        // Set the full file path
        $filePath = $desktopPath . '/' . $updatedFileName;

        // Move the file to the desired directory with the new file name
        $file->move($desktopPath, $updatedFileName);

        return $filePath;
    }

    /* HANDLE DELETE FILE */
    public function deleteFile(string $path)
    {
        if ($path && File::exists($path)) {
            File::delete($path);
        }
    }
}
