<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // return $request->all();
        $request->merge([
            'password' => bcrypt($request->password),
            'created_by' => $request->created_by
        ]);
        $user = User::create($request->all());
        
        /* $user->fill($request->all)->save();
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->created_by = $request->created_by; */

        if($user)
        {
            return redirect('home');
        }
        else
        {
            return "some error";
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
        $user = User::where('id',$id)->first();
        return view('edit',compact('user'));
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
        // $isUpdated = User::findOrFail($request->id)->fill($request->all())->save();
        $isUpdated = User::findOrFail($request->id)->update($request->all());
        if($isUpdated)
        {
            return redirect('home');
        }       
        else
        {
            return "some error";
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
        $user = User::find($id);
        $user->delete();
        return redirect('home');
    }
}
