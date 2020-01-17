<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    public function photos()
    {
        return $this->belongsTo('App\Photo');
    }

    public function galleries()
    {
        return $this->belongsTo('App\Gallery');
    }
}
