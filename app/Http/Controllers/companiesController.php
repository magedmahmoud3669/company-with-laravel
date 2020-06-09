<?php

namespace App\Http\Controllers;

use App\company;
use Illuminate\Http\Request;
use Illuminate \Support\facades\Auth;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $companies=company::all();
        if(Auth::check()){
            //function get() for show name companies but not work may for version laravel
            //$companies=company::where('user_id', Auth::user()->id)-get()
            $companies=company::where('user_id', Auth::user()->id);
            $companies=company::all();
            return view('com.index',['companies'=> $companies]);
            }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('com.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $company=company::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'user_id' => Auth::user()->id
            

            ]);
        if($company){
            return redirect()->route('companies.show',['company'=>$company->id])->with('success','company is created succesfully');
        }
        return back()->withInput()->with('errors','company is not created ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company-
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        
        $company=company::find($company->id);
         return view('com.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        $company=company::find($company->id);
           return view('com.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        
        $companyUpdate = company::where('id',$company->id)
                        ->update([
                            'name'=>$request->input('name'),
                            'description'=>$request->input('description')


                        ]);
                        
         if($companyUpdate){
             return redirect()->route('companies.show',['company'=>$company->id])->with('success','company updated succesfully');
         }  
                      
        return back()->withInput()->with('errors','company could not be updated');
        
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
        $findCompany=company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')->with('success','company deleted successfully');
        }
        return back()->withInput()->with('errors','company not deleted');
    }
}
