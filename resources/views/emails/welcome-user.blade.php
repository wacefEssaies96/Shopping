@component('mail::message')
# Welcome

Welcome to our website, {{ $data['name']}} your account is successfuly created with email {{ $data['email']}}  .
You can connect now to use all services.

@component('mail::button', ['url' => $url])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
