<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //employee
    public function employee(){
        return view('employee.create');
    }
    //store
    public function store(Request $request){
            $request->validate([
                'name' => 'required',
                'detail' => 'required',
                'status' => 'required',
            ]);
            Employee::create($request->all());
            return redirect()->route('employee.index')
            ->with('success','employee created successfully.');
    }
    //index
    public function index(){
        $employs=Employee::get();
        return view('employee.index',compact('employs'));
    }
    // ---------------Active-----------------
    public function Active($id){
        Employee::findOrFail($id)->update(['status' => '1',]);
       return redirect()->back();
        }
    // -----------------deactive----------------------
    public function Deactive($id){
        Employee::findOrFail($id)->update(['status' => '0',]); 
        return redirect()->back();
    }
    //edit
    public function edit($id){
        $employs=Employee::find($id);
        // dd($employs);
        return view('employee.edit',compact('employs'));
    }
    //update
    public function update(Request $request, $id)
    {
        $student = Employee::find($id);
        $student->name = $request->input('name');
        $student->detail = $request->input('detail');
        $student->status = $request->input('status');
        $student->update();
        return redirect()->route('employee.index')->with('status','employee Updated Successfully');
    }
     //show
     public function show($id){
        $employs=Employee::find($id);
        return view('employee.show',compact('employs'));
    }
    //delete
    public function delete($id){
        Employee::find($id)->delete();
        return redirect()->route('employee.index')
                        ->with('success','employee deleted successfully');
    }
}
