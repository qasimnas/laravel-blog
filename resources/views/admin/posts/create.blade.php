@extends('layouts.app')


@section('content')

@if (count($errors) > 0)
 <ul class="list-group">
    @foreach ($errors->all() as $error)
        {{-- expr --}}

                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
 @endforeach
</ul>
@endif


   <ul class="list-group">

                        <li class="list-group-item">
                            Create a new Post
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">

            <label for="title" >Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">

            <label for="featured">Featured Image</label>
            <input type="file" name="featured" class="form-control">
        </div>
        <div class="form-group">

            <label for="category">Select a Category</label>
            <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>}

                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Select Tags</label>
@foreach ($tags as $tag)
 <div class="checkbox">

    <label><input type="checkbox" name='tags[]' value="{{ $tag->id }}"> {{$tag->tag}}</label>
  </div>
      @endforeach

        </div>
        <div class="form-group">

            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>
        </div>
          <div class="form-group">

           <div class="text-center">
            <button class="btn btn-success" type="submit">Store Post</button>

           </div>
        </div>

    </form>
                        </li>
                    </ul>


@stop

@section('styles')
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#content').summernote();
});


</script>
@stop