@component('mail::message')
    <strong>Name</strong> {{ $data['name'] }}
    <strong>Email</strong> {{ $data['email'] }}
    <strong>Subject</strong> {{ $data['subject'] }}
    <strong>Message</strong>
    {{ $data['message'] }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
