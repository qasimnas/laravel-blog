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
        @if ($posts->count() > 0)
        @foreach ($posts as $post)

            <tr>
                <td>
                   <img src="{{ $post->featured }}" width="90px" height="50px" />
                </td>
                  <td>
                    {{ $post->title }}
                </td>
                <td>

                    <a href="{{ route('post.edit',['id'=> $post->id]) }}" class="btn btn-xs btn-info">
                        Edit

                    </a>
                </td>
                                <td>

                    <a href="{{ route('post.delete',['id'=> $post->id]) }}" class="btn btn-xs btn-danger">
                        Trash

                    </a>
                </td>
            </tr>
        @endforeach
          @else

         <tr>
                <th colspan="5" class="text-center">
                    No Pulished Post

                </th>
            </tr>

        @endif
    </tbody>



 </table>


</li>
</ul>


@stop