<div class="list-block">
    <span class="text">{{ __('Name: :name', ['name' => $user->name]) }}</span>
    @auth
        @php
            $userStatusId = $user->getUserPublicStatus();
            $statusTitle = \App\Models\UserStatus::getTitleById($userStatusId);
        @endphp
        <span class="text">{{ __('E-mail: :email', ['email' => $user->email]) }}</span>
        <span class="text">{{ $statusTitle }}</span>
    @endauth
</div>
