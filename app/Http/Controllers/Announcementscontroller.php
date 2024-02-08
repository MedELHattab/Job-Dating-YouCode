<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementsRequest;
use App\Models\Announcements;
use App\Models\Companies;
use App\Models\Skills;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcements::latest()->paginate(5);
        $companies = Companies::latest()->paginate(5);

        return view('announcements.index', compact('announcements', 'companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function allann()
    {
        $announcements = Announcements::all();
        $companies = Companies::all();
        return view('allannouncements', compact('announcements', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companies::all();
        $skills = Skills::all();
        return view('announcements.create', compact('companies', 'skills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementsRequest $request)
    {
        $announcement = null;

        if ($request->image) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/announcements/';
            $file->move($path, $fileName);

            $announcement = Announcements::create([
                'title' => $request->title,
                'description' => $request->description,
                'company_id' => $request->company_id,
                'image' => $fileName,
            ]);
        } else {
            $announcement = Announcements::create([
                'title' => $request->name,
                'description' => $request->description,
                'company_id' => $request->company_id,
            ]);
        }

        // Attach skills to the announcement
        $announcement->skills()->attach($request->input('skill_ids', []));

        return redirect()->route('announcements')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $announcement = Announcements::find($id);

        // You might want to add some error handling in case the announcement is not found
        if (!$announcement) {
            abort(404, 'Announcement not found');
        }

        $companies = Companies::all();
        $skills = Skills::all();

        return view('announcements.show', compact('announcement', 'companies', 'skills'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcements $announcement, Companies $companies)
    {
        $announcements = Announcements::all();
        $companies = Companies::all();
        $skills = Skills::all();

        return view('announcements.edit', compact('announcement', 'companies', 'skills'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementsRequest $request, Announcements $announcement)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $request->company_id,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/announcements/';
            $file->move($path, $fileName);
            $data['image'] = $fileName;
        }

        // Update the announcement details
        $announcement->update($data);

        // Sync the skills
        $announcement->skills()->sync($request->input('skill_ids', []));

        return redirect()->route('announcements')->with('success', 'Announcement updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcements $announcement)
    {
        $announcement->delete();
        //  dd($announcement);
        return redirect()->route('announcements')
            ->with('success', 'announcement deleted successfully');
    }

    public function archive()
    {
        $announcements = Announcements::onlyTrashed()->get();
        $companies = Companies::all();
        // dd($announcements);
        return view('announcements.archive', compact('announcements', 'companies'));
    }

    public function myapplications()
    {
        $announcements = auth()->user()->announcements()->latest()->paginate(5);


        return view('announcements.myapplications', compact('announcements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function apply(Request $request, Announcements $announcement)
    {
        $user = auth()->user();

        // Attach the single announcement_id to the user's announcements
        $user->announcements()->attach($announcement->id);

        return redirect()->route('announcements.show', compact('announcement'))
            ->with('success', 'Thank you for applying.');
    }
}
