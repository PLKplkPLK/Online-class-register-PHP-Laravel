<div style="margin-left: 20%; width:70%; float: right  " class="p-6 text-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900">
                <div>
                    <h2 style="padding: 14px" class="font-semibold text-xl text-gray-800 leading-tight">Otrzymane wiadomości</h2>
                </div>
                <div style="height: 300px; overflow-y: scroll; padding: 12px">
                    @foreach($messages as $message)
                        <?php $sender = App\Models\User::where('id', $message->sender_id)->first(); ?>
                        @if($user->role==2)
                            <a href={{ route('message.tsendmessage',['reply_id'=>$sender->id, 'title'=>'Re: '.$message->title]) }}>
                        @elseif($user->role==3)
                            <a href={{ route('message.sendmessage',['reply_id'=>$sender->id, 'title'=>'Re: '.$message->title]) }}>
                        @else
                            <a href={{ route('message.asendmessage',['reply_id'=>$sender->id, 'title'=>'Re: '.$message->title]) }}>
                        @endif
                            <div style="padding:4px; border: solid 1px #6b7280; border-radius: 5px">
                                Wiadomość od: <b>{{$sender->name}} {{$sender->surname}}</b><br>
                                Z dnia {{$message->created_at}}<br>
                                <b>{{$message->title}}</b><br>
                                {{$message->message}}
                            </div><br>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
