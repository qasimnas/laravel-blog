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
                            Create a new User
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">

            <label for="name" >User</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">

            <label for="email" >Email</label>
            <input type="email" name="email" class="form-control">
        </div>

          <div class="form-group">

           <div class="text-center">
            <button class="btn btn-success" type="submit">Add User</button>

           </div>
        </div>

    </form>
                        </li>
                    </ul>


@stop