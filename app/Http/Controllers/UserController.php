<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $transaction_id;
    public function __construct($transaction_id)
    {
        $this->transaction_id=$transaction_id;
    }

    public function testing():array
    {
        // return 'your bill is paid'; 
        return [
            'amount' => 12334,
            'transaction_id' => $this->transaction_id,
        ];
    }

    public function Save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->created_by = $request->created_by;

        if($user->save())
        {
            return redirect('home');
        }
        else
        {
            return "some error";
        }
    }

    public function Edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('edit',compact('user'));
        // return $user;
    }

    public function Update(Request $request)
    {
        $isUpdated = User::findOrFail($request->id)->fill($request->all())->save();
        if($isUpdated)
        {
            return redirect('home');
        }
        else
        {
            return "some error";
        }
    }

    public function Destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('home');
    }

    public function ResetPassword($id)
    {
        return view('changepassword',compact('id'));
    }
    public function ChangePassword(Request $request)
    {
        // return $request->all();     
        $user = User::where('id',$request->id)->first();
        $user->password =Hash::make($request->password);
        if($user->Update())
        {
            return redirect('home');
        }
        else
        {
            return "some error";
        }

    }
}
