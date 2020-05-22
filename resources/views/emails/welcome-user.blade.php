@component('mail::message')
# Welcome

Welcome to our website, your account is successfuly created.
You can connect now to use all services.

@component('mail::button', ['url' => $url])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
