<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersGridInterface $usersGrid
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if(Auth::user()->isAdmin()) {
            return view('admin.users.index', ['users' => User::paginate(25)]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin()) {
            return view('admin.users.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAdmin()) {
            if (trim($request->password) == '') {
                $data = $request->except('password');
            } else {
                $data = $request->all();
                $data['password'] = bcrypt($request->password);
            }

            User::create($data);

            return redirect('/admin/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->isAdmin()) {
            return view('admin.users.edit', ['user' => User::findOrFail($id)]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->isAdmin()) {
            $user = User::findOrFail($id);
            if (trim($request->password) == '') {
                $data = $request->except('password');
            } else {
                $data = $request->all();
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            return redirect('/admin/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->isAdmin()) {
            User::findOrFail($id)->delete();

            return redirect('/admin/users');
        }
    }
}
