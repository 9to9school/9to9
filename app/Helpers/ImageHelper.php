<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
  public static function uploadImage($file, $path = 'uploads')
  {
      if (!$file) {
          return null;
      }

      $fileName = time() . '_' . $file->getClientOriginalName();
      $filePath = $file->storeAs($path, $fileName, 'public');

      return $filePath; // Returns storage path like 'uploads/image.jpg'
  }

  public static function getImageUrl($filePath)
  {
      return $filePath ? Storage::url($filePath) : asset('images/default.png');
  }
}