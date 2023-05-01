<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = company::latest()->paginate(10);

        return view('companies.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:companies',
            'logo'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website'          =>  'required'
        ]);

        $file_name = time() . '.' . request()->logo->getClientOriginalExtension();

        request()->logo->move(public_path('images'), $file_name);

        $company = new company;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $file_name;
        $company->website = $request->website;

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, company $company)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:companies',
            'logo'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website'          =>  'required'
        ]);

        $logo = $request->hidden_logo;

        if($request->logo != '')
        {
            $logo = time() . '.' . request()->logo->getClientOriginalExtension();

            request()->logo->move(public_path('images'), $logo);
        }

        $company = company::find($request->hidden_id);

        $company->name = $request->name;

        $company->email = $request->email;

        $company->logo = $logo;

        $company->website = $request->website;

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company Data deleted successfully');
}
}
