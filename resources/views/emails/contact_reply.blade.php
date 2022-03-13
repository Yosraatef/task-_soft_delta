
@php($itemScount = 0 )

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::message')
#  @lang('Hello , This Reply Your Message')

@component('mail::table')

|@lang('Reply Your Message')|
|:---:|
| @lang('Hi') {{ $contact['name'] }}  {{ $contact['reply'] }} |

@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent


