<?php

namespace App;

use App\Traits\HasMediaTuto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Routage extends Model implements HasMedia
{
    use HasMediaTrait, HasMediaTuto;
    /**
     * @param $request
     * @param $first / Is it first picture ?
     * @return bool
     */
    public function insertPicture($request)
    {
        $picture = isset($request->resume) ? $request->resume : null;
        if ($picture !== null) {
            $media = $this->addMedia($picture)
                ->withResponsiveImages()
                ->toMediaCollection();
            // always attach media to user and recipe
            $this->medias()->attach([$media->id]);
            Auth::user()->medias()->attach([$media->id]);
        }
    }
}
