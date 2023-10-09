<?php

$all_notifications = [
	'danger',
	'dark',
	'light',
	'link',
	'primary',
	'secondary',
	'success',
	'warning',
];

?>
@foreach($all_notifications as $notification)

@if( session()->has($notification) )
<x-notification :color="$notification">
	{!! session($notification) !!}
</x-notification>
@endif

@endforeach
