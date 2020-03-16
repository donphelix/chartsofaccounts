<?php

namespace App\Http\Controllers;

use App\DB0006\TB208;
use App\DB0006\TB38;
use App\DB0011\TB239;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @param $service_type_id
     * @param $pws
     * @return Renderable
     */
    public function index($service_type_id=null,$pws=null)
    {
        $pws = $pws?decrypt($pws):null;
        return view('home', compact('service_type_id','pws'));
    }
}
