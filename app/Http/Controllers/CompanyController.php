<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = \App\Company::orderBy('id', 'desc')->paginate(5);
        return view('company.company',compact('company'));
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
            'logo'      => 'required','image','mimes:PNG','max:2000',
            'website'   => 'required','string'
        ]);
        $company = new Company;
        $company->nama      = $request->nama;
        $company->email     = $request->email;
        $company->website   = $request->website;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $filename = time().'-'.$name;
            $file->move('storage/app/company', $filename);
            $company->logo   = $filename;
        }else{
            return $request;
            $company->logo = '';
        }
        $company->save();

        return redirect('/company')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = \App\Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = \App\Company::findorFail($id);
        $request->validate([
            'nama'      => 'required','string',
            'email'     => 'required','string',
            'logo'      => 'required','image','mimes:png','max:200',
            'website'   => 'required','string'
        ]);
        
        /* if( $file = $request->hasFile('logo')){
            $filename = $file->getClientOriginalName();
            $request->file('logo')->move('storage/app/company', $filename);
            $img = $file->move('storage/app/company', $filename);
        }else{
            $img = $request->logo;
        } */
        $company->nama       =   $request->nama;
        $company->email      =   $request->email;
        $company->website    =   $request->website;

        if($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/app/company'), $filename);
            $company->logo = $request->file('logo')->getClientOriginalName();
        }
    
        $company->update();
        return redirect('/company')->with('sukses', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = \App\Company::find($id);
        $company->delete();
        return redirect('/company')->with('sukses', 'Data Berhasil Dihapus');
    }


}
