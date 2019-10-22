@if(session('notice'))
    <div class="alert alert-info message_flash">
        {!! session('notice') !!}
    </div>
@endif
