<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutageController extends Controller
{
    public function show(Routage $routage){
        $pictureSet = $routage->medias()->get();
        if ($pictureSet->isNotEmpty()) {
            // will return the picture set to the routage that were uploaded by the author
            $picturesOfAuthor = $pictureSet->filter(function ($value) use ($routage) {
                if ($value->users()->first()->id === $routage->user_id) {
                    return $value;
                }
            });
            $picturesOfUsers = $pictureSet->filter(function ($value) use ($routage) {
                if ($value->users()->first()->id !== $routage->user_id) {
                    return $value;
                }
            });
        } else {
            $picturesOfAuthor = collect([]);
            $picturesOfUsers = collect([]);
        }
    }
}
