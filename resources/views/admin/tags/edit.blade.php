@extends('layouts.app')


@section('content')

@include('admin.includes.errors')



   <ul class="list-group">

                        <li class="list-group-item">
                            Update Tag : {{$tag->name}}
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('tag.update',['id'=> $tag->id]) }}" method="post" >
        {{csrf_field()}}
        <div class="form-group">

            <label for="name" > Tag Name</label>
            <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
        </div>


           <div class="text-center">
            <button class="btn btn-success" type="submit">Update Tag</button>

           </div>

    </form>
                        </li>
                    </ul>


@stop