<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * رفع ملف واحد وحفظه في المجلد المحدد.
     */
    public static function upload(UploadedFile $file, string $directory = 'uploads'): string
    {
        $name = Str::uuid() . '.' . $file->getClientOriginalExtension();

        return $file->storeAs($directory, $name, 'public');
    }

    /**
     * رفع عدة ملفات وإرجاع مصفوفة المسارات.
     *
     * @param  array<int, UploadedFile>  $files
     * @return array<int, string>
     */
    public static function uploadMany(array $files, string $directory = 'uploads'): array
    {
        $paths = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = self::upload($file, $directory);
            }
        }

        return $paths;
    }

    /**
     * حذف ملف من التخزين.
     */
    public static function delete(string $path): bool
    {
        if (empty($path)) {
            return false;
        }

        return Storage::disk('public')->delete($path);
    }
}
