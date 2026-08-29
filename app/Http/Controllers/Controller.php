<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;

abstract class Controller extends BaseController
{
    protected const ALLOWED_IMAGE_MIMES = [
        'image/jpeg',
        'image/png',
        'image/webp',
        'image/gif',
        'image/bmp',
    ];

    protected const ALLOWED_VIDEO_MIMES = [
        'video/mp4',
        'video/quicktime',
        'video/x-msvideo',
        'video/x-ms-wmv',
    ];

    /**
     * Reject the upload unless its actual (sniffed) MIME type is on the allowlist.
     * Laravel's `image`/`mimes` validation rules already do this via fileinfo,
     * this is a second, explicit check against our own strict list.
     */
    protected function assertAllowedMimeType(UploadedFile $file, array $allowedMimes, string $field): void
    {
        if (!in_array($file->getMimeType(), $allowedMimes, true)) {
            throw ValidationException::withMessages([
                $field => 'The uploaded file type is not allowed.',
            ]);
        }
    }
}
