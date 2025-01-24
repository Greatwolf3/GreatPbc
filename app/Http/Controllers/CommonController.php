<?php

namespace app\Http\Controllers;

use app\Models\User;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getConnectedUsers()
    {
        // Supponendo che tu abbia un campo 'is_online' nel modello User
        $connectedUsersCount = User::where('is_online','!=','1970-01-01 00:00:00')->where('is_online','!=','000-00-00 00:00:00')->where('roles',0)->count();

        return response()->json(['connected_users' => $connectedUsersCount]);
    }
   /* public function logout(Request $request)
    {
        $date_zero=Carbon::parse('1970-01-01');

    //    User::where('id',Filament::auth()->user()->getAuthIdentifier())->update(['is_online'=>$date_zero]);
      //  Filament::auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }*/
    public function getCarousel(Request $request)
    {
        $position=$request->input('position');
        return $position;
    }
}
