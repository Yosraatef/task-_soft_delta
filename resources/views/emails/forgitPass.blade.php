
@php($itemScount = 0 )

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::message')
#  Hello , This Your Code

@component('mail::table')




|Your Code To Chang Your Password|
|:------------:|
| {{ $user['code'] }} |


@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent



