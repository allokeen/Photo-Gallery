<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GalleryPhoto
 *
 * @property int $id
 * @property int $gallery_id
 * @property int $photo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Gallery $galleries
 * @property-read \App\Photo $photos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto wherePhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GalleryPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
