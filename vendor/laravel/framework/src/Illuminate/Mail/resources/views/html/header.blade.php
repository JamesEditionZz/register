<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('/img/Black.png') }}" class="logo" alt="Laravel Logo" width="100px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
