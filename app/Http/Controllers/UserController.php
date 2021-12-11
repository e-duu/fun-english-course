<?php

namespace App\Http\Controllers;

use App\Exports\UsersTemplate;
use App\Imports\UsersImport;
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
        $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:6|max:16',
            'photo' => 'required'
        ],
        [
            'name.required' => 'please input your name',
            'username.required' => 'username has been already exist',
            'email.required' => 'email has been already exist',
            'role.required' => 'please select the role',
            'photo.required' => 'please insert your profile photo',
            'password.required' => 'password must be at least 6 characters',

        ]);

        $data = request()->all();
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('users'), $new_name_image);
        $request->merge([
            'photo' => $new_name_image
        ]);
        User::create($data);
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
    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     $data['photo'] = $request->file('photo')->store('assets/users', 'public');
    //     $item = User::findOrFail($id);
    //     $item->update($data);
    //     return redirect()->route('user.all');
    // }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
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
            unlink('storage/' . $image);
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

    public function filterReset()
    {
        return redirect()->route('user.all');
    }
}
