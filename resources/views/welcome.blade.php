<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div >


                <div class="row" style="align-items: center;margin: 20px 20% ">


                    @if(isset($posts))

                        @foreach($posts as $post)
                            <div class="col-sm-12" style="margin: 20px;border: 1px solid grey;padding: 10px">
                               <div>
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->Description}}</p>
                            <div>
                                <img style="width: 100%;height: 500px" src="/images/{{$post->image}}" alt="">
                            </div>

                            <div style="margin:10px 0px ">

                                <h5>Comments</h5>
                                @if(isset($post->commments))
                                    <p>Total Comments: {{$post->comments->count()}}</p>
                                @endif
                                    @foreach($post->comments as $comment)

                                    <p ><strong>{{$comment->user->name}}</strong>:   {{$comment->comment}}</p>
                                @endforeach
                            </div>

                            <div>
                                <form style="display:inline" action="{{ route('comment.store',$post->id) }}"  method="post">
                                    {!! csrf_field() !!}

                                    <input hidden type="text" name="id" placeholder="Enter Comment" value="{{$post->id}}" required>
                                    
                                    <input class="form-control" type="text" name="comment" placeholder="Enter Comment" required>
                                    <button class="btn btn-primary " type="submit" style="margin-top: 10px"
                                            >Post

                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                        @endforeach
                    @endif


                </div>

            </div>
        </div>
    </body>
</html>
