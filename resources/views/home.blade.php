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
                <img src="https://img.icons8.com/cute-clipart/50/000000/exit.png"/>
            </div>
            <div class="nav-user-icon online">
                <img src="images/profile-icon.png">
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- left-sidebar --}}
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><i class="fa-solid fa-address-card"></i>Profile</a>
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
                        <p>Jahidul</p>
                    </div>
                </div>
                <div class="post-input-container">
                    <textarea name="" id=""  rows="3" placeholder="Share your lite, Jahidul!"></textarea>
                    <div class="add-post-links">
                        <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/video-message.png"/>Live video</a>
                        <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/image-gallery.png"/>Photo/Video</a>
                        <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/comedy.png"/>Feeling/Activity</a>
                        <a href="#" class='submit-post'><img src="https://img.icons8.com/external-febrian-hidayat-outline-color-febrian-hidayat/64/000000/external-send-user-interface-febrian-hidayat-outline-color-febrian-hidayat.png"/>Submit</a>
                    </div>
                    
                </div>
            </div>

            <div class="post-container">
                <div class="user-profile">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/name.png"/>
                    <div class="">
                        <p>Jahidul</p>
                        <span>March 24, 2022, 12.40 pm</span>
                    </div>
                </div>
                <p class="post-text">jfjsdk uufuk gskfjgh dgkhgsdkughdjvhbgdhg fjdh gusdgh   bghdghgjh</p>
                <hr>
                <div class="post-row">
                    
                    <div class="activity-icons">
                        <div><img src="https://img.icons8.com/glyph-neue/64/000000/thick-arrow-pointing-up.png"/>120</div>
                        <div><img src="https://img.icons8.com/color/48/000000/comments--v1.png"/>120</div>
                        <div><img src="https://img.icons8.com/external-bearicons-detailed-outline-bearicons/64/000000/external-Save-social-media-bearicons-detailed-outline-bearicons.png"/>120</div>
                    </div>
                   
                </div>
            </div>

        </div>
        {{-- right-sidebar --}}
        <div class="right-sidebar"></div>
    </div>

</body>
</html>