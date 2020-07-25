<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Photo extends Model
{
    protected $fillable = [
        'user_id', 'path', 'originalName', 'product_id'
    ];
    protected $upload = '/images/';

    public function getPathAttribute($photo) {
        return $this->upload . $photo;
    }

    public function getOriginalNameAttribute($photo) {
        return pathinfo($photo, PATHINFO_FILENAME);
    }

    /**
     * Uploading photo on the server and create record in DB
     * @param $file
     * @param $newName
     * @return $photo_id
     */
    public function photoUpload($file, $newName, $product_id){

        $name = uniqid($newName) . '.' . $file->getClientOriginalExtension();
        $file->move('images', $name);

        $photo = Photo::create(['path'=>$name, 'product_id'=>$product_id, 'user_id'=>Auth::user()->id, 'originalName'=>$file->getClientOriginalName()]);

        return $photo->id;
    }

}
