<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel = "stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="wrapper chating">
        <section class="chat-area">
        <header>
            <a href="" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <div class="details">
            <span>{{$user->name}}</span>
            <p>{{$user->email}}</p>
            </div>
        </header>
        <div class="chat-box">
        </div>
            <form action="#" class="typing-area">
                @csrf
                
                <input type="text" class="incoming_id" name="incoming_id" value="{{$user->id}}" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button type="submit" ><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    
    <script src="/js/chat.js"></script>
</body>
</html>