<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="custom css/home.css">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="post-container">
        <div class="user-profile">
            <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
            <div class="">
                <p>{{$p->user->name}}</p>
                <span>{{$p->createdAt}}</span>
            </div>
        </div>
        <p class="post-text">{{$p->postText}}</p>
        <hr>
        <div class="post-row">
            <div></div>
            <div class="activity-icons">
                {{-- @php$liked = $p->like->user;@endphp --}}
                <div><a href="{{route('like', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/glyph-neue/64/000000/thick-arrow-pointing-up.png"/></a>{{count($p->like)}}</div>
                <div><a href="{{route('comment.view')}}"><img src="https://img.icons8.com/color/48/000000/comments--v1.png"/></a>{{count($p->comment)}}</div>
                <div><a href="{{route('save', ['postId' => encrypt($p->id)])}}"><img src="https://img.icons8.com/external-bearicons-detailed-outline-bearicons/64/000000/external-Save-social-media-bearicons-detailed-outline-bearicons.png"/></a>{{count($p->favourite)}}</div>
            </div>
        
        </div>
    </div>
</body>
</html>