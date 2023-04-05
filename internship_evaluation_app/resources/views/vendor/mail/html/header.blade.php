@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.syntra-limburg.be/themes/custom/sassy/assets/images/syntra/logo.svg" class="logo" alt="SyntraPXL Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
