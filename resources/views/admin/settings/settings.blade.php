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
                            Edit Blog Settings
                        </li>
                        <li class="list-group-item">


                            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">

            <label for="site-name" >Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
        </div>
        <div class="form-group">

            <label for="address" >Address</label>
            <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
        </div>

                <div class="form-group">

            <label for="contact_number" >Contact Phone</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
        </div>

                        <div class="form-group">

            <label for="contact_email" >Contact Email</label>
            <input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
        </div>

          <div class="form-group">

           <div class="text-center">
            <button class="btn btn-success" type="submit">Update Site Settings</button>

           </div>
        </div>

    </form>
                        </li>
                    </ul>


@stop