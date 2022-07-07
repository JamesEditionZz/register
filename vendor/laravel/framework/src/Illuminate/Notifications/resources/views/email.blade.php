@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('CloudSite')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('ด้วยความเคารพ / ยินดีให้บริการ')<br>
@lang('ทีมงาน : CloudSite')<br>
@lang('Email : CloudSite@gmail.com')<br>
@lang('บริหารโดย : Cloud-Site')<br>
@lang('https://www.cloudsite.co')<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@endisset
@endcomponent
