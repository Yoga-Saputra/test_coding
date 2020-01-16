<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee   = \App\Employee::orderBy('id', 'desc')->paginate(5);
        $company    = \App\Company::all();
        return view('employee.employee', compact('employee', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required','string',
            'email'     => 'required','string',
            'company'   => 'required','string'
        ]);
        $employee = new Employee;
        $employee->nama         = $request->nama;
        $employee->email        = $request->email;
        $employee->company_id   = $request->company;

        $employee->save();
        return redirect('/employee')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = \App\Employee::find($id);
        $company = \App\Company::all();
        return view('employee.edit', compact('employee', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
/*     public function update(Request $request, $id)
    {
        
        $employee = \App\Employee::findorFail($id);
        $request->validate([
            'nama'      => 'required','string',
            'email'     => 'required','string',
            'company'   => 'required','string'
        ]);
        $employee->nama         =   $request->nama;
        $employee->email        =   $request->email;
        $employee->company_id   =   $request->company_id;

        $employee->save();
        return redirect('/employee');
    } */
    public function update(Request $request, $id)
    {
        $employee = \App\Employee::findorFail($id);
        $request->validate([
            'nama'      => 'required','string',
            'email'     => 'required','string',
            'company'   => 'required','string'
        ]);
        $employee->nama         =   $request->nama;
        $employee->email        =   $request->email;
        $employee->company_id   =   $request->company;

        $employee->save();
        return redirect('/employee')->with('sukses', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = \App\Employee::destroy($id);
        
        return redirect('/employee')->with('sukses', 'Data Berhasil Dihapus');
    }
}
