@component('mail::message')
#Hello {{$name}}!

Thanks for signing up at {{config('app.name', 'Laravel')}}! We're excited to have you as an early user.

@component('mail::button', ['url' => url('/register/verify/'.$confirmation_code)])
Verify Email
@endcomponent

Thanks,<br>
Team {{ config('app.name') }}
@endcomponent
