<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Companies;
use App\Models\Skills;
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function index(){
        $userSkills = auth()->user()->skills()->pluck('id');

        // Query announcements with at least one skill matching the user's skills
        $announcements = Announcements::whereHas('skills', function ($query) use ($userSkills) {
            $query->whereIn('id', $userSkills);
        })->latest()->paginate(10);
        $companies = Companies::latest()->paginate(5);
        $skills = Skills::all();
        
        return view('welcome',compact('announcements','companies','skills'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}