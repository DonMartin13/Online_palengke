<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    @foreach($chats as $chat)
        @if($chat->outgoing_msg_id == $authUserID)
            <div class="chat outgoing">
                <div class="details">
                    <p>{{$chat->message}}</p>
                </div>
            </div>
        @else
            <div class="chat incoming">
                <div class="details">
                    <p>{{$chat->message}}</p>
                </div>
            </div>
        @endif
    @endforeach
</body>
</html>