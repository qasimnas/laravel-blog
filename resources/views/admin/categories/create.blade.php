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
                            Create a new Category
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('category.store') }}" method="post" >
        {{csrf_field()}}
        <div class="form-group">

            <label for="name" >Name</label>
            <input type="text" name="name" class="form-control">
        </div>


           <div class="text-center">
            <button class="btn btn-success" type="submit">Store Category</button>

           </div>

    </form>
                        </li>
                    </ul>


@stop