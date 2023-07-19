@php
    $message = $type = null;
    if(session()->has('success')) {
        $message = session()->get('success');
        $type = "success";
    }

    if(session()->has('error')) {
        $message = session()->get('error');
        $type = "danger";
    }
@endphp

@if($type !== null && $message !== null)
    <x-alert :type="$type" :message="$message"></x-alert>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
@endif
