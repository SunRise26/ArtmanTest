<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $userStatuses = UserStatus::getUserStatuses();
        $selectedStatusId = isset($user->userStatus) ? $user->userStatus->status_id : $userStatuses['online'];

        return view('profile', [
            'user' => $user,
            'userStatuses' => $userStatuses,
            'selectedStatusId' => $selectedStatusId,
        ]);
    }}
