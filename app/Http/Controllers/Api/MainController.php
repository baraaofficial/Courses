<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Framework;
use App\Models\Level;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function framework()
    {
        $frameworks = Framework::paginate(2);
        return responseJson(1, 'success',  $frameworks);
    }

    public function level()
    {
        $levels = Level::inRandomOrder()->limit(10)->get();
        return responseJson(1, 'success',  $levels);
    }
}
