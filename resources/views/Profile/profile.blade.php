
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL('custom css/profile.css')}}">
    <title>Document</title>
    
</head>
<body>
                    @if(Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
    <div class="container text-center ">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-md-6 mt-5  p-2 bg-light shadow">
                <div class="card">
                    <div class="img">
                        <img class="img-fluid rounded-top" src="images/a.png" alt="cover photo">
                        @if(is_null($profileData->profileImage))
                            
                                <img class="rounded-circle bg-dark" src="images/p.jpg" alt="profile image">
                            
                            @else
                                <img class="rounded-circle bg-dark" src="{{asset($profileData->profileImage)}}" alt="profile image">
                            
                            @endif
                        
                    </div>
                    <div class="crad-body">
                        <div class="card-title">
                            <h3>{{$profileName->name}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-secondary text-white font-weight-bold" onclick="document.location='{{route('editProfile')}}'" ><img src="https://img.icons8.com/ios-glyphs/20/000000/edit--v1.png"/> Edit profile</button>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" style="list-style: none;">
                            
                            <li class="list-group-item  border-0"><img src="https://img.icons8.com/ios-glyphs/20/000000/home-page--v1.png"/> Lives in <b>{{$profileData->address ?? ''}}</b></li>
                            <li class="list-group-item border-0"><img src="https://img.icons8.com/material/25/000000/birthday-cake--v1.png"/>Birthday <b>{{$profileData->dob ?? ''}}</b></li>
                            <li class="list-group-item border-0"><img src="https://img.icons8.com/ios-glyphs/20/000000/person-male.png"/><b>{{$profileData->gender ?? ''}}</b></li>
                            <li class="list-group-item border-0"><img src="https://img.icons8.com/material/20/000000/filled-like--v1.png"/><b>{{$profileData->relationship ?? ''}}</b></li>
                        </ul>
                    </div>
                    <div class="card-footer ">
                        <div class="row ">
                            <div class="item col-md-2  offset-md-1 col-sm-4">
                                <span>2K</span>
                                posts
                            </div>
                            
                            <div class="item col-lg-3 col-md-3  offset-md-1 col-sm-4">
                                <span>12K</span>
                                following
                            </div>
                            
                            <div class="item col-md-3  offset-md-1 col-sm-4">
                                <span>120K</span>
                                followers
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>