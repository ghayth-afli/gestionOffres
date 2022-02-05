<div wire:poll>
    <div class="box box-success">
            <div class="box-header">
            <i class="fa fa-comments-o"></i>
            <h3 class="box-title">Chat</h3>
            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
            </div>
            </div>
            <div class="box-body chat" id="chat-box">
            <!-- chat item -->
            @forelse ($messages as $message)
                <div class="item">
                    @if(file_exists($message->user->avatar))
                        <img src="{{ asset($message->user->avatar) }}" alt="user image" class="offline">
                    @else
                        <img src="{{ asset('img/config/nopic.png') }}" alt="user image" class="offline">
                    @endif	
                    <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans(null, false, false) }}</small>
                        {{ $message->user->name }}
                    </a>
                    {{ $message->message_text }}
                    </p>
                </div>
            @empty
                <h5 style="text-align: center;color:red"> Chat Is Empty</h5>
            @endforelse
            <!-- /.item -->
            
            </div>
            <!-- /.chat -->
            <div class="box-footer">
                <form wire:submit.prevent="sendMessage">
                    <div class="input-group">
                        <input class="form-control" placeholder="Type message..." wire:model.defer="messageText" type="text">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
