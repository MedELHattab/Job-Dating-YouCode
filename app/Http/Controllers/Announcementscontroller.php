<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcements::latest()->paginate(5);
        
        return view('announcements.index',compact('announcements'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name'=>'required|min:10|max:255',
            'description'=>'required|string',
            'location'=>'required|string',
    
        ]);
        
        Announcements::create($request->all());
         
        return redirect()->route('announcements')
                        ->with('success','announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcements $announcements)
    {
        return view('announcements.show',compact('announcements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcements $announcements)
    {
        return view('announcements.edit', compact('announcements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcements $announcements)
    {
        $request->validate([
            'name'=>'required|min:10|max:255',
            'description'=>'required|string',
            'location'=>'required|string',
    
        ]);
        
        $announcements->update($request->all());
        
        return redirect()->route('announcements')
                        ->with('success','announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcements $announcement)
    {
        $announcement->delete();
        //  dd($announcement);
        return redirect()->route('announcements')
                        ->with('success','announcement deleted successfully');
    }
}
