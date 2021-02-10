@php
    $userStatus = $user->userStatus;
@endphp

<div class="list-block">
    <span class="name">Name: {{ $user->name }}</span>
    <span>Status: {{ $userStatus->getTitle() }}</span>
</div>
