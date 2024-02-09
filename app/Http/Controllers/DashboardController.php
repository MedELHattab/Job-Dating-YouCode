<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcements;
use App\Models\Companies;
use App\Models\Skills;
use Illuminate\Http\Request;


class DashboardController extends Controller{
    public function statistic(){
        $users = User::count();
        $companies= Companies::count();
        $announcements= Announcements::count();
        $skills = Skills::count();

        return view('dashboard', compact('users','companies','announcements','skills'));
        }
}
