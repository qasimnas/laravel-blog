@extends('layouts.app')


@section('content')

@include('admin.includes.errors')



   <ul class="list-group">

                        <li class="list-group-item">
                            Update Category : {{$post->title}}
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('post.update',['id'=> $post->id]) }}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="form-group">

            <label for="name" >Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control">
        </div>

         <div class="form-group">

            <label for="featured">Featured Image</label>
            <input type="file" name="featured" class="form-control">
        </div>
        <div class="form-group">

            <label for="category">Select a Category</label>
            <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                                @if ($post->category_id == $category->id)
                                    selected
                                @endif

                            >{{ $category->name }}</option>}

                    @endforeach
            </select>
        </div>
           <div class="form-group">
            <label for="tags">Select Tags</label>
@foreach ($tags as $tag)
 <div class="checkbox">

    <label><input type="checkbox" name='tags[]' value="{{ $tag->id }}"

          @foreach ($post->tags as $t)
              @if ($tag->id == $t->id)
                  checked
              @endif
          @endforeach
        > {{$tag->tag}}</label>
  </div>
      @endforeach

        </div>
        <div class="form-group">

            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" cols="5" rows="5">{{$post->content}}</textarea>
        </div>


           <div class="text-center">
            <button class="btn btn-success" type="submit">Update Post</button>

           </div>

    </form>
                        </li>
                    </ul>


@stop