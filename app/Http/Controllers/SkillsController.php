<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\User;
use App\Http\Requests\SkillsRequest;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::latest()->paginate(5);
        return view('skills.index',compact('skills'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillsRequest $request)
    {
 
        Skills::create($request->validated());
         
        return redirect()->route('skills')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $companies)
    {
        return view('skills.show',compact('skills'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skill)
    {  
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillsRequest $request, Skills $skill)
    {
        // dd($request);
        // $request->validate([
        //     'name'=>'required|min:10|max:255',
        //     'description'=>'required|string',
        //     'location'=>'required|string',
    
        // ]);
        $skill->update($request->validated());
        
        // dd($request);
       
        
        return redirect()->route('skills')
                        ->with('success','skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skills $skill)
    {   
        $skill->delete();
         
        return redirect()->route('skills')
                        ->with('success','skill deleted successfully');
    }

    public function archive(){
        $skills = Skills::onlyTrashed()->get();

        return view('skills.archive',compact('skills'));
    }


    public function myskills()
    {
        $allSkills = Skills::all();
        // Assuming the many-to-many relationship is defined in your User model
        $skills = auth()->user()->skills()->latest()->paginate(5);
       
    
        return view('skills.myskills', compact('skills','allSkills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function updateMyskills(Request $request)
{
    // Validate the request as needed

    // Assuming the many-to-many relationship is defined in your User model
    $user = auth()->user();

    // Sync the selected skill_ids with the user's skills
    $user->skills()->sync($request->input('skill_ids', []));

    return redirect()->route('skills.myskills')
                    ->with('success', 'Skills updated successfully.');
}
    

}