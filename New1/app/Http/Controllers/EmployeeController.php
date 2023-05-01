<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showEmp()
     {
         $Employees = Employee::all();
         return response()->json([
             'status' => 'success',
             'Employees' => $Employees,
    ]);
 }

    public function index()
    {
        $data = employee::latest()->paginate(10);

        return view('employees.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'          =>  'required',
            'last_name'         =>  'required',
            'company_id'         =>  'required',
            'email'         =>  'required|email|unique:employees',
            'phone'          =>  'required'
        ]);

       

    

        $employee = new employee;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;

        $employee->email = $request->email;;
        $employee->phone = $request->phone;

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'employee Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'first_name'          =>  'required',
            'last_name'         =>  'required',
            'company_id'         =>  'required',
            'email'         =>  'required|string|email',
            'phone'          =>  'required'
        ]);


        
        $employee = employee::find($request->hidden_id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;



        $employee->email = $request->email;


        $employee->phone = $request->phone;

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'employee Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'employee Data deleted successfully');
}
}
