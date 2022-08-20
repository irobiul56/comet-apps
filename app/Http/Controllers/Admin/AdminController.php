<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Notifications\AdminAccountInfoNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = Admin::latest() -> where('trash', false) -> get();
        $roles = Role::latest() -> get();
        return view('admin.pages.user.index', [
            'all_data'      => $all_data,
            'form_type'     => 'create',
            'roles'         => $roles

        ]);
    }


    public function adminTrashUser()
    {
        $all_data = Admin::latest() -> where('trash', true) -> get();
        return view('admin.pages.user.trash', [
            'all_data'      => $all_data,
            'form_type'     => 'trash',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[

            'name'              => ['required'],
            'email'             => ['required', 'unique:admins'],
            'cell'              => ['required', 'unique:admins'],
            'username'          => ['required', 'unique:admins'],
        ]);


        //genarete password

        $pass_string = str_shuffle('0123456789ABCD');
        $pass = substr($pass_string, 3, 6);
        //data send

        $user = Admin::create([

            'name'      => $request -> name,
            'role_id'   => $request -> role,
            'email'     => $request -> email,
            'cell'      => $request -> cell,
            'username'  => $request -> username,
            'password'  => Hash::make($pass),

        ]);

        $user -> notify(new AdminAccountInfoNotification([$user['name'], $pass ]));

        return back() -> with('success','Admin user created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_data = Admin::findOrfail($id);
        $admin_data -> delete();

        return back() -> with('danger-main', 'User delete successful');
    }

    public function adminStatus($id)
    {
        $admin_data = Admin::findOrfail($id);

        if ($admin_data -> status) {
            $admin_data -> update([
                'status'    => false
            ]);

        }else{
            $admin_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');

    }


    //Trash Update

    public function adminTrash($id)
    {
        $admin_data = Admin::findOrfail($id);
        if ($admin_data -> trash) {
            $admin_data -> update([
                'trash'    => false
            ]);

        }else{
            $admin_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }


}
