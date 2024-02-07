<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompaniesRequest;


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
    public function store(CompaniesRequest $request)
    {   
        
        if($request->image){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = 'uploads/companies/';
            $file->move($path, $fileName);
            Companies::create([
                'name' => $request->name,
                'description' => $request->description,
                'location'=> $request->location,
                'image' => $fileName,
            ]);
        }else{
        Companies::create([
            'name' => $request->name,
            'description' => $request->description,
            'location'=> $request->location,
        ]);
         }
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
    public function update(CompaniesRequest $request, Companies $company)
    {
        if($request->image){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = 'uploads/companies/';
            $file->move($path, $fileName);
            $company->update([
                'name' => $request->name,
                'description' => $request->description,
                'location'=> $request->location,
                'image' => $fileName,
            ]);
        }else{
        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'location'=> $request->location,
        ]);
         }
       
        
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

    public function archive(){
        $companies = Companies::onlyTrashed()->get();

        return view('companies.archive',compact('companies'));
    }


}
