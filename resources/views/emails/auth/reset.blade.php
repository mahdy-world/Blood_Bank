@component('mail::message')
# Introduction

blood_bank resetpassword

@component('mail::button', ['url' => 'http//ipda3.com'])
اعادة كلمة السر
@endcomponent

<p>Your code is : {{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
