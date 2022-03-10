<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="custom css/home.css">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav>
        <div class="nav-left">
            <p class="logo">Socialite</p>
            {{-- <img src="" class="logo"> --}}
            <ul>
                <li><i class="fa-solid fa-house"></i></li>
                <li><i class="fa-solid fa-bell"></i></li>
                <li><i class="fa-solid fa-message"></i></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type='text' placeholder="Search">
            </div>
            <div class="logout">
                <a href="{{route('logout')}}"><img src="https://img.icons8.com/cute-clipart/50/000000/exit.png"/></a>
            </div>
            <div class="nav-user-icon online">
                <a href="{{route('profile')}}"><img src="images/profile-icon.png"></a>
                
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- left-sidebar --}}
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="{{route('profile')}}"><i class="fa-solid fa-address-card"></i>Profile</a>
                <a href="#"><i class="fa-solid fa-briefcase"></i>Work profile</a>
                <a href="#"><i class="fa-solid fa-pencil"></i>My posts</a>
                <a href="#"><i class="fa-solid fa-star"></i>Favourite posts</a>
                <a href="#"><i class="fa-solid fa-face-smile"></i>Followers</a>
                <a href="#"><i class="fa-solid fa-face-kiss-wink-heart"></i>Following</a>
                <a href="#">See more</a>
            </div>
        </div>
        {{-- main-content --}}
        <div class="main-content">
            <div class="write-post-container">
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>{{Session::get('name')}}</p>
                    </div>
                </div>
                <form action="{{route('post.create')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="post-input-container">
                        <textarea name="postData" id=""  rows="3" placeholder="Share your lite, {{Session::get('name')}}"></textarea>
                        @error('post-data')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="add-post-links">
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/video-message.png"/>Live video</a>
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/image-gallery.png"/>Photo/Video</a>
                            <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/comedy.png"/>Feeling/Activity</a>
                        </div>
                        <div class="submit-post">
                            <input type="image" value="Submit" src='https://img.icons8.com/external-febrian-hidayat-outline-color-febrian-hidayat/64/000000/external-send-user-interface-febrian-hidayat-outline-color-febrian-hidayat.png'/>
                        </div>
                    </div>         
                </form>
            </div>

            @foreach($posts->reverse() as $p)
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
            @endforeach

        </div>
        {{-- right-sidebar --}}
        <div class="right-sidebar"></div>
    </div>

</body>
</html>