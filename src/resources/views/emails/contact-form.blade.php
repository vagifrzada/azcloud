@component('mail::message')
# You have a new email notification !
### {{ $data->get('fullname') }}, has sent new request via contact form.

- Phone: {{ $data->get('phone') }}
- Email: {{ $data->get('email') }}

Message: <br>
{{ $data->get('message') }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
