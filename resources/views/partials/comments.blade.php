<div class="row">
    <div class="col-md-12 col-md-12 col-sm-12 c col-xs-12 ">
        
            <!-- Fluid width widget -->        
          <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       <!-- <span class="glyphicon glyphicon-comment"></span> -->
                           <i class="fa fa-comment"></i>
                        Recent Comments
                    </h3>
                </div>
                <div class="panel-body">

                  @foreach($comments as $comment)
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                 
                                    <small>
                                      <a href="users/{{$comment->user->id}}" >
                                  {{$comment->user->first_name}} {{$comment->user->last_name}}
                                    -{{$comment->user->email}}</a>
                                    <br>
                                        commented on {{$comment->created_at}}
                                    </small>
                                </h4>
                                <p>
                                   {{$comment->body}}
                                </p>
                                proof
                                 <p>
                                   {{$comment->url}}
                                </p>
                            </div>
                        </li>
                         @endforeach
                    </ul>
                    
                </div>
            </div>
      
       
    </div>
    
  </div>

        </div>
        