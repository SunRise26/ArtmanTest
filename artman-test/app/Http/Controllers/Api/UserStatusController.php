<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserStatus\UpdateRequest;

class UserStatusController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Api\UserStatus\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();
        $userStatus = $user->userStatus;

        $userStatus->update($validatedData);
        return response()->json($userStatus->toJson());
    }
}
