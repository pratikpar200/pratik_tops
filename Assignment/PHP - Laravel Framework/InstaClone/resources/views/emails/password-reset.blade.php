@component('mail::message')
# Password Reset Request

Hi {{ $userName }},

We received a request to reset the password for your InstaClone account. No worries — it happens to the best of us!

Click the button below to choose a new password. This link will expire in 60 minutes for your security.

@component('mail::button', ['url' => $resetLink])
Reset My Password
@endcomponent

If you didn't request a password reset, you can safely ignore this email — your password will remain unchanged.

If you're having trouble clicking the button, copy and paste the URL below into your browser:
{{ $resetLink }}

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent