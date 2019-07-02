@component('mail::message')
# Hello {{ $book->user->name }}

You have been borrowed the following book:

<i>{{ $book->name }} by </i>{{ $book->author }}</strong>

Make sure to return it on time!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
