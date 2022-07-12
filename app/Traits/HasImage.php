<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

/**
 * Trait HasImage
 */
trait HasImage
{
  public function uploadImage($request, $path)
  {
    // dd($request->file('image'));
    $image = null;
    if ($request->file('image')) {
      $image = $request->file('image');
      $image->storeAs($path, $image->hashName());
    }

    return $image;
  }

  public function articleImage($request)
  {
    // dom article
    $article = $request;
    $dom = new \DomDocument();
    $dom->loadHtml($article, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getElementsByTagName('img');
    // foreach image
    foreach ($images as $k => $img) {
      $data = $img->getAttribute('src');
      list($type, $data) = explode(';', $data);
      list(, $data)      = explode(',', $data);

      // decode image
      $data = base64_decode($data);
      // name image
      $image_name = time() . $k . '.png';
      // path image
      $path = storage_path() . "/app/public/upload/";
      // check folder exist
      File::ensureDirectoryExists($path);
      // save image
      file_put_contents($path . $image_name, $data);
      $img->removeAttribute('src');
      // get image
      $img->setAttribute('src', asset('storage/upload/' . $image_name));
    }


    return $dom->saveHTML();
  }
}
