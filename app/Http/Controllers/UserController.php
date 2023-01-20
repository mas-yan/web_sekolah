<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = User::query()->latest();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '<a href="' . route("users.edit", $user->id) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $user->id . '" data-url="' . route('users.destroy', $user->id) . '" data-id="' . $user->id . '"><i class="fas fa-trash"></i></button>';
                })
                ->make();
        }
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|unique:users,email',
                'name' => 'required',
                'password' => 'required|confirmed|min:6'
            ],
            $this->messages()
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('categories.index')->with('success', 'User berhasil Ditambahkan');
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
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
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
        $user = User::find($id);
        if ($request->password) {
            $request->validate(
                [
                    'email' => [
                        'required',
                        Rule::unique('users', 'email')->ignore($user->id, 'id')
                    ],
                    'name' => 'required',
                    'password' => 'required|confirmed|min:6'
                ],
                $this->messages()
            );
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }else{
            $request->validate(
                [
                    'email' => [
                        'required',
                        Rule::unique('users', 'email')->ignore($user->id, 'id')
                    ],
                    'name' => 'required',
                ],
                $this->messages()
            );
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        return redirect()->route('users.index')->with('success', 'User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus di isi',
            'password.confirmed' => 'Password password tidak sesuai',
            'password.min' => 'Password minimal 6 karakter',
        ];
    }
}
