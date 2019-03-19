@extends('layouts.app')

@section('content')
<div class="container">





    


    <div class="row">
        <div class="col-sm-8">


            @if(isset($errors))
                @foreach($errors->all() as $error)
                    <div style="color: red">{{$error}}</div>
                @endforeach
            @endif

                <br>


            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}


                <div class="form-group">
                    <label for="title">Post Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter category Name"  >
                </div>



                <div class="form-group">
                    <label for="title">Description:</label>
                    <textarea type="text" name="description" class="form-control"  maxlength="1000" rows="10" placeholder="Enter Description" >
                                       {{ old('description') }}
                            </textarea>
                </div>
                <div class="form-group ">
                    <label for="image">Upload Image</label>
                    <input type="file" name="image"  class="form-control"
                    @if(!isset($post))

                            @endif >
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>

</div>
@endsection
