<?php

namespace app\Http\Controllers;

use app\Models\Mappa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
class GameController extends Controller
{


    public function game()
    {
        if(Auth::check()) {
            $order = ['C', 'N', 'S', 'O', 'E'];
            $image_carousel = Mappa::where('game_id', 2)->orderByRaw("FIELD(posizione, '" . implode("','", $order) . "')")->get();
       
            return view('game.index', ['images_carousel' => $image_carousel]);
        }
        return redirect('/');

    }
}
