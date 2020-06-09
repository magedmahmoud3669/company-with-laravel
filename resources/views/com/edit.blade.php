@extends('layouts.app')
@section('content')

<div class="row  col-md-9 col-lg-9 col-sm-9 pull-left">
   
<h1>Update company</h1>

      

      
      
      <div class="row  col-md-12 col-lg-12 col-sm-12" style ="background : white; margin:10 px ; ">
     
<form method="post" action="{{ route('companies.update',[$company->id]) }}">
                   {{ csrf_field() }}
                  <input type="hidden" name="_method" value="put">
                  <div class="form-group">
                      <label for="company-name">name<span class="required">*</span></label>
                      <input placeholder="Enter-name"
                                      id="company-name"
                                      required
                                      name="name"
                                      spellcheck="false" 
                                      class="form-control" 
                                      value="{{$company->name}}" 
                      />
                  </div>

                  <div class="form-group">
                      <label for="company-content">Description</label>
                      <textarea
                                      placeholder="Enter-Description"
                                      
                                      id="company-content"
                                      required
                                      name="description"
                                       row="5" spellcheck="false" 
                                      class="form-control autosize-target text-left" >
                                       

                       {{$company->description}}
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
              <li><a href="/companies/{{$company->id}}">list companies</a></li>
              <li><a href="/companies/{{$company->id}}">All companies</a></li>
              
            </ol>
          </div>



        @endsection