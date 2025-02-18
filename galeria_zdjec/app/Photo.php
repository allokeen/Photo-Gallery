<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Photo
 *
 * @property int $id
 * @property string $filename
 * @property int $userID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $photos
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUserID($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Gallery[] $galleries
 * @property-read int|null $galleries_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereDescription($value)
 * @property-read \App\User $user
 */
class Photo extends Model
{
    protected $fillable = ['filename', 'user_id', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function galleries()
    {
        return $this->belongsToMany('App\Gallery', 'gallery_photos');
    }
}
