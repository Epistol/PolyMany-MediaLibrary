<?php

namespace App;

use Spatie\MediaLibrary\Models\Media as BaseMedia;

class Media extends BaseMedia
{
    public function users()
    {
        return $this->morphedByMany(User::class, 'mediable');
    }
}
