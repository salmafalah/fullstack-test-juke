<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function view()
    {
        $data['profiles'] = Profile::get();
        return view('profiles/view', $data);
    }

    public function add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', 'unique:profiles', 'regex:/^\S*$/'],
                'zip_code' => ['required', 'integer'],
            ],
            [
                'username.regex' => 'Username cannot contain spaces',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            Profile::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
            ]);
            DB::commit();

            Session::flash('success', 'Profile Berhasil Dibuat.');
            return redirect('profile');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('error', 'Profile Gagal Dibuat.');
            return back();
        }
    }

    public function edit($id)
    {
        $data['profile'] = Profile::where('id', $id)->first();

        return view('profiles/edit', $data);
    }

    public function update($id)
    {
        $request = request();

        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', 'regex:/^\S*$/', 'unique:profiles,username,' . $id],
                'zip_code' => ['required', 'integer'],
            ],
            [
                'username.regex' => 'Username cannot contain spaces',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            Profile::where('id', $id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
            ]);
            DB::commit();

            Session::flash('success', 'Profile Berhasil Diubah.');
            return redirect('profile');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            Session::flash('error', 'Profile Gagal Diubah.');
            return back();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Profile::where('id', $id)->delete();

            DB::commit();

            Session::flash('success', 'Profile Berhasil Dihapus.');
            return redirect('profile');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            Session::flash('error', 'Profile Gagal Dihapus.');
            return redirect()->back();
        }
    }
}
