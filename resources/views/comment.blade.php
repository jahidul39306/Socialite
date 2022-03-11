<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL('custom css/home.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('Layouts.header')
    
    <div class="container">
        @include('Layouts.sidebar')
        <div class="main-content">
            <div class="post-container">
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>{{$post->user->name}}</p>
                        <span>{{$post->createdAt}}</span>
                    </div>
                </div>
                <p class="post-text">{{$post->postText}}</p>
                <hr>
                <div class="post-row">
                    <div></div>
                    <div class="activity-icons">
                        {{-- @php$liked = $p->like->user;@endphp --}}
                        <div><a href="{{route('like', ['postId' => encrypt($post->id)])}}"><img src="https://img.icons8.com/glyph-neue/64/000000/thick-arrow-pointing-up.png"/></a>{{count($post->like)}}</div>
                        <div><a href="{{route('comment.view', ['postId' => encrypt($post->id)])}}"><img src="https://img.icons8.com/color/48/000000/comments--v1.png"/></a>{{count($post->comment)}}</div>
                        <div><a href="{{route('save', ['postId' => encrypt($post->id)])}}"><img src="https://img.icons8.com/external-bearicons-detailed-outline-bearicons/64/000000/external-Save-social-media-bearicons-detailed-outline-bearicons.png"/></a>{{count($post->favourite)}}</div>
                    </div>
                </div>
            </div>
            <form action="{{route('comment.create', ['postsId' => $post->id])}}" method="POST">
                {{ csrf_field() }}
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>{{$post->user->name}}</p>
                        <span>{{$post->createdAt}}</span>
                    </div>
                </div>
                <div class="post-input-container" >
                    <textarea name="comment" id=""  rows="3" placeholder="Give comment!!! {{Session::get('name')}}"></textarea>
                    @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="submit-post">
                        <input type="image" value="Submit" src='https://img.icons8.com/external-febrian-hidayat-outline-color-febrian-hidayat/64/000000/external-send-user-interface-febrian-hidayat-outline-color-febrian-hidayat.png'/>
                    </div>
                </div>         
            </form>

            @foreach($comments as $c)
            <div class="post-container">
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>{{$c->user->name}}</p>
                        <span>{{$c->createdAt}}</span>
                    </div>
                </div>
                <p class="post-text">{{$c->text}}</p>
            </div>
            @endforeach
            
        </div>
        
        <div class="right-sidebar"></div>
    </div>

</body>
</html>