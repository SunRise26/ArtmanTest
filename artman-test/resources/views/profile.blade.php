@php
    $user_status_update_uri = route('api.user-status.update');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="profile-page py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="user-data" class="user-data p-6 bg-white border-b border-gray-200">
                    <span class="text">{{ __('Name: :name', ['name' => $user->name]) }}</span>
                    <span class="text">{{ __('E-mail: :email', ['email' => $user->email]) }}</span>
                    <span class="text">{{ __('Created at: :time', ['time' => $user->created_at]) }}</span>
                    <x-select id="user-status-select" class="input cursor-pointer" >
                        @foreach ($userStatuses as $statusCode => $statusId)
                            <option {{ $statusId == $selectedStatusId ? "selected" : "" }} value="{{ $statusId }}">
                                {{ \App\Models\UserStatus::getTitleByCode($statusCode) }}
                            </option>
                        @endforeach
                    </x-select>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(() => {
        const userBlock = $("#user-data")
        const statusSelector = $("#user-status-select");
    
        const setActionsDisabled = (disabled) => {
            const inputs = userBlock.find(".input");
            disabled ? inputs.addClass('is-disabled') : inputs.removeClass('is-disabled');
        }

        statusSelector.change((e) => {
            const target = $(e.target);
            setActionsDisabled(true);

            $.ajax({
                type: "PATCH",
                url: '{{ $user_status_update_uri }}',
                headers: {"X-XSRF-TOKEN": $.cookie("XSRF-TOKEN")},
                data: {
                    status_id: target.val()
                },
                complete: (xhr) => {
                    if (xhr.status != 200) {
                        location.href = window.location.href;
                    }
                    setActionsDisabled(false);
                }
            });
        });
    });
</script>
