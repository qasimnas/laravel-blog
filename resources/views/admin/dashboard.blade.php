@extends('layouts.app')

@section('content')

        <div class="col-lg-3">

            <div class="panel panel-info">
                <div class="panel-heading">


                     POSTED
                </div>

                <div class="panel-body">

<h1 class="text-center">

{{$posts_count}}

</h1>

                </div>


                </div>

            </div>


        <div class="col-lg-3">

            <div class="panel panel-danger">
                <div class="panel-heading">


                    TRASHED POST
                </div>

                <div class="panel-body">

<h1 class="text-center">

{{$trashed_count}}

</h1>

                </div>


                </div>

            </div>

 <div class="col-lg-3">

            <div class="panel panel-success">
                <div class="panel-heading">


                    USERS
                </div>

                <div class="panel-body">

<h1 class="text-center">

{{$users_count}}

</h1>

                </div>


                </div>

            </div>


 <div class="col-lg-3">

            <div class="panel panel-info">
                <div class="panel-heading">


            CATEGORIES
                        </div>

                <div class="panel-body">

<h1 class="text-center">

{{$categories_count}}

</h1>

                </div>


                </div>

            </div>





@endsection
