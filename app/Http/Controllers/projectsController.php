<?php

namespace App\Http\Controllers;

use App\project;
use App\company;
use App\User;
use App\ProjectUser;


use Illuminate\Http\Request;
use Illuminate \Support\facades\Auth;

class projectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $projects=project::all();
        if(Auth::check()){
            //function get() for show name projects but not work may for version laravel
            //$projects=project::where('user_id', Auth::user()->id)-get()
            $projects=project::where('user_id', Auth::user()->id);
            $projects=project::all();
            return view('projects.index',['projects'=> $projects]);
            }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //function to add team members
    public function adduser(Request $request){
        //add user to project

        //take a project,add user to it
        $project=project::find($request->input('project_id'));
         if(Auth::user()->id == $project->user_id){
             $user=User::where('email',$request->input('email'))->first();
             $projectUser=ProjectUser::where('user_id',$user->id)
                                      ->where('project_id',$project->id)
                                      ->first();
            if($projectUser){
                    return redirect()->route('projects.show',['project'=>$project->id])->with('success',
                    $request->input('email').'already a member of this project');
            }
            
       
              if($user && $project){
                $project->users()->attach($user->id);
                return redirect()->route('projects.show',['project'=>$project->id])->with('success',
                    $request->input('email').'was added succesfully');
        }

        }
               return redirect()->route('projects.show',['project'=>$project->id])->with('errors',' Error is adding email');

    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create($company_id=null)
    {
        //
        $companies=null;
        if(!$company_id){
            $companies=company::where('user_id',Auth::user()->id);
            $companies=company::all();
        }
        return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
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
            $project=project::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'project_id'=>$request->input('project_id'),
            'user_id' => Auth::user()->id
            

            ]);
        if($project){
            return redirect()->route('projects.show',['project'=>$project->id])->with('success','project is created succesfully');
        }
        return back()->withInput()->with('errors','project is not created ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project-
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        
        $project=project::find($project->id);
        $comments=$project->comments;
         return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $project=project::find($project->id);
           return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        
        $projectUpdate = project::where('id',$project->id)
                        ->update([
                            'name'=>$request->input('name'),
                            'description'=>$request->input('description')


                        ]);
                        
         if($projectUpdate){
             return redirect()->route('projects.show',['project'=>$project->id])->with('success','project updated succesfully');
         }  
                      
        return back()->withInput()->with('errors','project could not be updated');
        
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
        $findproject=project::find($project->id);
        if($findproject->delete()){
            return redirect()->route('projects.index')->with('success','project deleted successfully');
        }
        return back()->withInput()->with('errors','project not deleted');
    }
}
