@foreach($users as $user)

    @if($user->id != $authUser->id)
        <a href="{{route('message.chat',['user'=>$user])}}">
            <div class="content">
                <div class="details">
                            <span>{{$user->name}}</span>
                            <p>{{$user->email}}</p>
                </div>
            </div>
        </a>
    @endif

@endforeach