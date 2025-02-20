<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',  // Must contain at least one uppercase letter
                'regex:/[@$!%*?&]/',  // Must contain at least one special character
                'confirmed',  // Must match the confirmation password
            ],
        ], [
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter and one special character.',
            'password.confirmed' => 'The confirm password does not match.',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->password != $request->password_confirmation)
        {
            return redirect()->back()->with('warning', 'Passwords do not match.');
        }else
        {
            $data['password'] = Hash::make($request->password);

            $user = User::create($data);

            return redirect()->route('user.index')->with('message', 'User Added Successfully!');
        }
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
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
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

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',  // Must contain at least one uppercase letter
                'regex:/[@$!%*?&]/',  // Must contain at least one special character
                'confirmed',  // Must match the confirmation password
            ],
        ], [
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter and one special character.',
            'password.confirmed' => 'The confirm password does not match.',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if(!empty($request->password && !empty($request->password_confirmation)))
        {
            if($request->password != $request->password_confirmation)
            {
                return redirect()->back()->with('warning', 'Passwords do not match.');
            }else
            {
                $data['password'] = Hash::make($request->password);

                $user = User::where('id', $id)->update($data);
                return redirect()->route('user.index')->with('message', 'User Updated Successfully!');
            }
        }else
        {
            $user = User::where('id', $id)->update($data);
            return redirect()->route('user.index')->with('message', 'User Updated Successfully!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('message', 'User Deleted Successfully!');
    }
}
