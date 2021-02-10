@php
    $userStatus = $user->userStatus;
@endphp

<div class="list-block">
    <span class="text">{{ __('Name: :name', ['name' => $user->name]) }}</span>
    @auth
        <span class="text">{{ __('E-mail: :email', ['email' => $user->email]) }}</span>
        <span class="text">{{ $userStatus->getTitle() }}</span>
    @endauth
</div>
