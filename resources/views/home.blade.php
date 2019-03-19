@extends('layouts.app')

@section('content')
<div class="container">

    <div style="display: block;text-align: center"><a href="{{route('post.create')}}"><h3>Create Post</h3></a></div>

    <div class="row">

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($posts))
                @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td><img style="height: 150px;width: 150px"   src="images/{{$post->image}}" alt=""></td>
                <td><a class = "fas fa-pencil-alt" href="{{ route('post.edit',$post->id) }}">
                    </a>

                    <form style="display:inline" action="{{ route('post.destroy',$post->id) }}" {{--onsubmit="return validation()"--}} method="post">

                        {{ method_field('DELETE') }}
                        {!! csrf_field() !!}

                        <button type="submit" style="background: transparent"
                                data-original-title="Delete">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                        </button>
                    </form>
                    
                 </td>
            </tr>

            @endforeach
            @endif
            </tbody>
        </table>



    </div>

</div>
@endsection
