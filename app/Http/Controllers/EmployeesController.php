<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EmployeesController extends Controller
{
    public function index()
    {
        $companies = Companies::pluck('name', 'comp_id')->toArray();

        $data=Employees::paginate(5);

        return view('employees.index', compact(['companies','data']));
    }

    public function edit($id)
    {
        $data=Employees::find($id);
        $companies = Companies::where('comp_id','!=',$data['company'])->pluck('name', 'comp_id')->toArray();
        return view('employees.edit', compact(['data','companies']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'exists:companies,comp_id|numeric',
            'phone' => 'numeric',
            'email'=>'email'

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
            $employee = Employees::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company' => $request->company,
                'phone' => $request->phone,
                'email' => $request->email
            ]);
        } catch (QueryException $e) {
            $message = "Employee failed to be created!";
            return redirect()->back()->withErrors($message);
        }
        if ($employee) {
            $message = "Employee created successfully!";
            return redirect()->back()->with('success', $message);
        }

    }

    public function show($id)
    {
        $Employee = Employees::findOrFail($id);
        if ($Employee) {
            return view('employees', compact('Employee'));
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'exists:companies,comp_id|numeric',
            'phone' => 'numeric',
            'email'=>'email'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        try {
           Employees::findorfail($id)->update($request->all());
            $message = "Employee updated successfully!";
            return redirect()->route('employee')->with('success', $message);
        }
        catch (QueryException $e){
            $message = "Employee failed to be updated!";
            return redirect()->back()->withErrors($message);
    }
    }

    public function destroy($id)
    {
        try{
            Employees::findorfail($id)->delete();
            $message="Employee deleted successfully";
            return redirect()->back()->with('success', $message);
        }
        catch (QueryException $e){
            $message="Employee failed to be deleted";
            return redirect()->back()->withErrors($message);
        }

    }


}