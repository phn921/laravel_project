@extends('layouts.forum')

@section('content')
   <div class="container">
     <div class="row my-3">
        <div class="col-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{url('/')}}/create" class="btn btn-success">New Post</a>
            </div>
        </div>
     </div>
     <hr>
    
     @if(count($posts)>0)
     <div class="row mt-3">
        <div class="col-12">
            <h4>{{$category_title}}</h4>
            <ul class="list-group">
               @foreach($posts as $post)

                <li class="list-group-item list-group-item-action">
                  <a href="{{url('/')}}/{{$post->id}}}/view" style="text-decoration: none" class="text-dark">{{$post->title}}</a>
                    <span class="badge bg-info text-dark"><i class="fa-solid fa-comment-dots"></i></i>
                      {{App\Models\Reply::where('post_id', $post->id)->count()}}
                    </span>
                    <span class="badge bg-danger"><i class="fa-solid fa-heart"></i>{{App\Models\Reply::where('post_id', $post->id)->count()}}</span>
                    <br>
                    <small>{{$post->created_at}} | by SB Hero</small>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 my-3">
          {{$posts->links() }}
        </div>
     </div>
     @endif
   </div>
@endsection