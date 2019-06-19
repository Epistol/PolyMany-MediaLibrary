<?php

namespace App\Traits;

trait HasMediaTuto
{

    /**
     * @return mixed
     */
    public function medias()
    {
        return $this->morphToMany(\App\Media::class, 'mediable');
    }


}
