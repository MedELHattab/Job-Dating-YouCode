<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::latest()->paginate(5);
        return view('companies.index',compact('companies'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        Companies::create($request->all());
         
        return redirect()->route('companies')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Companies $companies)
    {
        return view('companies.show',compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Companies $company)
    {  
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Companies $companies)
    {
        // dd($request);
        // $request->validate([
        //     'name'=>'required|min:10|max:255',
        //     'description'=>'required|string',
        //     'location'=>'required|string',
    
        // ]);
        $companies->update($request->all());
       
        
        return redirect()->route('companies')
                        ->with('success','company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Companies $company)
    {   
        $company->delete();
         
        return redirect()->route('companies')
                        ->with('success','Company deleted successfully');
    }
}
