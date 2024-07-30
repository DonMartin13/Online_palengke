<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div>
            @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
            @endif
    </div>
    <div class="wrapper user-wrapper">
        <section class="users">
        <header>
            <div class="content">
                <div class="details">
                    <span>{{$authUser->name}}</span>
                </div>
            </div>
         
            <a href="#" class="logout">Logout</a>
        </header>
        
        <div class="search">
            <span class="text">Select a user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
    
        </div>
        </section>
    </div>

    <script src="js/users.js"></script>
</body>
</html>