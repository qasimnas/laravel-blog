@extends('layouts.app')



@section('content')

<ul class="list-group">

 <li class="list-group-item">


<table class="table table-hover">

    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @if ($users->count() > 0)
        @foreach ($users as $user)

            <tr>
                <td>
                   <img src="{{ asset($user->profile->avatar) }}" width="60px" height="60px" style="border: radius : 50%;" />
                </td>
                  <td>
                    {{ $user->name }}
                </td>
                <td>
                    @if ($user->admin)
                         <a href="{{ route('user.not.admin' , ['id' =>  $user->id]) }}" class="btn btn-xs btn-danger">
                        Remove Permissions

                    </a>
                    @else
                    <a href="{{ route('user.admin' , ['id' =>  $user->id]) }}" class="btn btn-xs btn-info">
                        Make Admin

                    </a>
                    @endif

                </td>
                                <td>
                @if (Auth::user()->admin)
                   <a href="{{ route('user.delete' , ['id' =>  $user->id]) }}" class="btn btn-xs btn-danger">
                        Delete

                    </a>
                                        @endif

                </td>
            </tr>
        @endforeach
          @else

         <tr>
                <th colspan="5" class="text-center">
                    No Users

                </th>
            </tr>

        @endif
    </tbody>



 </table>


</li>
</ul>


@stop