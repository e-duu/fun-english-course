<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\UsersTemplate;
use App\Imports\UsersImport;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new User();

        if (request()->get('role') && request()->get('role') != null) {
            $data = $data->where('role', '=', request()->get('role'));
        }

        $data = $data->paginate(5);

        return view('pages.admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (substr_replace("$request->number", "", 1) == 0) {
            return back()->with('error', 'characters cannot start with 0')->withInput();
        }

        $request->validate(
            [
                'name' => 'required|min:3|max:255',
                'number' => 'required|unique:users,number|min:1',
                'username' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'phone' => 'required',
                'password' => 'required|min:6|max:16',
                // 'photo_file' => 'required',
                // 'parent' => 'required',
                // 'city' => 'required',
                // 'country' => 'required',
                'status' => 'required',
            ],
            [
                'name.required' => 'please input user name',
                'number.required' => 'please input user number',
                'number.unique' => 'student number already exists',
                'username.required' => 'please input username',
                'email.required' => 'please input user email',
                'email.unique' => 'email has been already exist',
                'role.required' => 'please select the role',
                'password.required' => 'password must be at least 6 characters',
                'phone.required' => 'please input user phone',
                'parent.required' => 'please input user parent',
                'status.required' => 'please input user status',
                // 'photo_file.required' => 'please insert your profile photo',
                // 'city.required' => 'please input user city',
                // 'country.required' => 'please input user country',

            ]
        );

        if ($request->photo_file) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('users'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);
        }

        $user = User::create($request->all());
        return redirect()->route('user.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findorfail($id);
        return view('pages.admin.users.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findorfail($id);
        return view('pages.admin.users.edit', compact('data'));
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
        $rules = [
            'name' => 'required',
            'number' => 'nullable|unique:users,number,' . $id,
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'phone' => 'required',
            'parent' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'status' => 'nullable',
        ];

        $data = User::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('users'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);

            $img_path = public_path('users/' . $data->photo);
            if (file_exists($img_path)) {
                unlink($img_path);
            }
        } else {
            $data = $request->except('photo');
        }

        if (!empty($request->password)) {
            $rules['password'] = 'required';
            $data = $request->all();
        } else {
            $data = $request->except('password');
        }

        $request->validate($rules);

        User::find($id)->update($data);

        return redirect()->route('user.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        $this->removeImage($data->image);
        return back();
    }

    public function removeImage($image)
    {
        if (file_exists($image)) {
            unlink('/users/' . $image);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    public function template()
    {
        return Excel::download(new UsersTemplate, 'input-users.xlsx');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function filterReset()
    {
        return redirect()->route('user.all');
    }
}
