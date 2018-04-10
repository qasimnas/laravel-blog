@extends('layouts.app')


@section('content')

@include('admin.includes.errors')



   <ul class="list-group">

                        <li class="list-group-item">
                            Update Category : {{$category->name}}
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('category.update',['id'=> $category->id]) }}" method="post" >
        {{csrf_field()}}
        <div class="form-group">

            <label for="name" >Name</label>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
        </div>


           <div class="text-center">
            <button class="btn btn-success" type="submit">Store Category</button>

           </div>

    </form>
                        </li>
                    </ul>


@stop