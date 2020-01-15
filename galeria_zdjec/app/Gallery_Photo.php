<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gallery_Photo
 *
 * @property int $id
 * @property int $gallery_id
 * @property int $photo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Gallery $galleries
 * @property-read \App\Photo $photos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery_Photo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gallery_Photo extends Model
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
