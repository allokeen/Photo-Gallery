<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gallery
 *
 * @property int $id
 * @property string $galleryName
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery whereGalleryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photos
 * @property-read int|null $photos_count
 * @property string $token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gallery whereToken($value)
 */
class Gallery extends Model
{
    public function photos()
    {
        return $this->belongsToMany('App\Photo', 'gallery_photos');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

}
