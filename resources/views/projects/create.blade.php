@extends('layouts.app')
@section('content')



<div class="row  col-md-9 col-lg-9 col-sm-9 pull-left">

      
  <h1>Create new project</h1>
      
      
      <div class="row  col-md-12 col-lg-12 col-sm-12" style ="background : white; margin:10 px ; ">
     
<form method="post" action="{{ route('projects.store') }}">
                   {{ csrf_field() }}
                  
                  <div class="form-group">
                      <label for="project-name">name<span class="required">*</span></label>
                      <input placeholder="Enter-name"
                                      id="project-name"
                                      required
                                      name="name"
                                      spellcheck="false" 
                                      class="form-control" 
                                      
                                     
                      />
                  </div>

                       

                  <input 
                              class="form-control" 
                              type="hidden" 
                                      name="company_id"
                                      value="{{$company_id}}" 
                                      
                                     
                      />
                    

                  @if($companies !=null)
                   <div class="form-group">
                    <label for="company-content">select company</label>
                    <select name="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                     @endforeach
                     </select>
                   </div>
                  @endif


                  <div class="form-group">
                      <label for="project-content">Description</label>
                      <textarea
                                      placeholder="Enter-Description"
                                      
                                      id="project-content"
                                      required
                                      name="description"
                                       row="5" spellcheck="false" 
                                      class="form-control autosize-target text-left" >
                                       
                                      
                       
                     </textarea> 
                      
                  </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit">
                  </div>
    

  </form>





  </div>

<div class="col-sm-3 col-md-3 col-lg-3 pull-right">

    <div class="sidebar-module" style = "background : black ">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects">My projects</a></li>
              
              
            </ol>
          </div>


        @endsection