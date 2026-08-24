@component('mail::message')

<img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="InstaClone Logo" width="120" style="display:block; margin:0 auto 20px auto;">

# Welcome to InstaClone, {{ $userName }}!

We're excited to have you join our community.

Start exploring playlists, events, and connect with other users right away.

@component('mail::button', ['url' => url('/')])
Visit Homepage
@endcomponent

Thanks for signing up!

Regards,<br>
{{ config('app.name') }}
@endcomponent