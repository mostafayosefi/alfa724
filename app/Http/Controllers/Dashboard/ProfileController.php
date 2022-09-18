<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function edit() {
        return view('dashboard.' . Auth::user()->type . '.profile.edit');
    }

    public function update(ProfileUpdateRequest $request) {



        $user = Auth::user();
        $data = $request->all();
        $data['picture']= $user->picture;
        $data['picture']  =  uploadFile($request->file('picture'),'images/profiles',$user->picture);


        $user->update($request->validated());
        $user->update([ 'picture' => $data['picture'] ]);



        return redirect()->back()->with('success', 'پروفایل شما با موفقیت بروزرسانی شد!');
    }
}
