<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new User;
        $data->name = request('name');
        $data->email = request('email');
        $data->email_verified_at = request('email_verified_at');
        $data->password = request('password');
        $data->remember_token = request('remember_token');
        $data->created_at = request('created_at');
        $data->updated_at = request('updated_at');
        $data->save();
        return response ()->json('data created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        return response ()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $data = User::find($id);
            // $data->update(
            //     [
            //         'name' => request('name'),
            //         'email' => request('email'),
            //         'email_verified_at' => request('email_verified_at'),
            //         'password' => request('password'),
            //         'remember_token' => request('remember_token'),
            //         'created_at' => request('created_at'),
            //         'updated_at' => request('updated_at'),
            //     ]
            //     );

            User::where('id', '=', $id)
            ->update([
                'name' => request('name'), 
                'email' => request('email'),
                'email_verified_at' => request('email_verified_at'),
                'password' => request('password'),
                'remember_token' => request('remember_token'),
                'created_at' => request('created_at'),
                'updated_at' => request('updated_at'),
            ]);
            // $data->name = request('name');
            // $data->email = request('email');
            // $data->email_verified_at = request('email_verified_at');
            // $data->password = request('password');
            // $data->remember_token = request('remember_token');
            // $data->created_at = request('created_at');
            // $data->updated_at = request('updated_at');
            // $data->save();
            return response ()->json('data updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return response ()->json('data deleted', 200);
    }
}
