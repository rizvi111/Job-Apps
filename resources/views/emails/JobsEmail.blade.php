@component('mail::message')

    Kire,{{$data['friend_name']}},Ei Nam Theke
    Ei Lok {{$data['your_name']}} Job Pathaise.

@component('mail::button', ['url' => $data['jobUrl']])
Click Kor
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
