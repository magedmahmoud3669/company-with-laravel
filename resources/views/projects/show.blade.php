@extends('layouts.app')
@section('content')
<div class="row  col-md-3 col-sm-3 col-lg-3 pull-right">
          <!--<div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
        -->
         <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit"><i class="fa fa-edit"></i>Edit</a></li>
              <li><a href="/projects/create"><i class="fa fa-plus-circle"></i>create new project</a></li>
              <li><a href="/projects"><i class="fa fa-briefcase"></i>my projects</a></li>
              <br/>

              @if($project->user_id == Auth::user()->id)
              <li><a
                  href="#"
                   onclick="
                   var result =confirm('are you sure to delete this project') ;
                       if(result){
                           // event.preventDefault();
                            document.getElementById('delete-form').submit();
                       }
                   " 

                >
               <i class="fa fa-trash"></i>

              Delete</a>
              <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}"
               method="POST" style="display: none;">
               <input type="hidden" name="_method" value="delete">
               {{csrf_field()}}

                
              </form> 
            </li>
              @endif 
              
            </ol>

           <h4>Add members</h4>
           <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
             <form id="add-user" action="{{route('projects.adduser')}}"
               method="POST" >
                  {{ csrf_field() }}
               <div class="input-group">
                <input  class="form-control" name="project_id" value="{{$project->id}}" type="hidden">
               <input class="form-control" type="text"  name="email" placeholder="Email">
               <span class="input-group-btn">
               <button class="btn btn-default" type="submit">Add</button>
               </span>
             </div>

               </form>

             </div>
           </div>


           
               <h4>Team members</h4>
               <ol class="list-unstyled">
                @foreach($project->users as $user)
                <li><a href="#">{{$user->email}}</a></li>
               
                
                 @endforeach

               </ol>
            
          

          </div>
          
        </div>






<div class="row  col-md-9 col-lg-9 col-sm-9 pull-left">
<br>

      <!-- commentsssssssssss
      The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <!--<div class="masthead">
        <h3 class="text-muted">Project name</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
    -->

      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead"> {{$project->description}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>
      <div class="row" style ="background : white; margin:10 px ;">

      <!--  <a href="/projects/create" class="pull-right btn btn-default btn-sm">Add Project</a>-->

     
       <br/><br/>
       <!-- container fluid class bootstrap for organize comment under project-->
        <div class="row container-fluid">
        <form method="post" action="{{ route('comments.store') }}">
                   {{ csrf_field() }}
                  
                <input type="hidden" name="commentable_type" value="App\project"> 
                <input type="hidden" name="commentable_id" value="{{$project->id}}"> 

                  <div class="form-group">
                      <label for="comment-content">Comment</label>
                      <textarea
                                      placeholder="Enter-comment"
                                      
                                      id="comment-content"
                                      required
                                      name="body"
                                       row="5" spellcheck="false" 
                                      class="form-control autosize-target text-left" >
                                       
                                      
                       
                     </textarea> 
                      
                  </div>
                  <div class="form-group">
                      <label for="comment-content">Proof of work done(Url/photos)</label>
                      <textarea
                                      placeholder="Enter url or screenshots"
                                      
                                      id="comment-content"
                                      required
                                      name="url"
                                       row="3" spellcheck="false" 
                                      class="form-control autosize-target text-left" >
                                       
                                      
                       
                     </textarea> 
                      
                  </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit">
                  </div>
    

  </form>
  

</div>


      
      @include('partials.comments')
        </div>

      

      </div>





    

       
        @endsection