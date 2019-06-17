@component('mail::message')
#ایمیل فعالسازی
@component('mail::button' , ['url' => route('activation.account' , $code)])
فعالسازی اکانت
@endcomponent
@endcomponent
