@component('mail::message')

# Dear {{ $user->name }},

<h1>Your account has been successfully created</h1>

@component('mail::button', ['url' => route('userinfos.show', ['userinfo' => $user->id])])
    View Profile
@endcomponent

<p>From,</p>
<h2>{{ config('app.name') }}</h2>
@endcomponent

