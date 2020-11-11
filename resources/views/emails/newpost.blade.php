
@component('mail::message')
<h1>Grazie per il tuo post->{{$article->title}}</h1>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

