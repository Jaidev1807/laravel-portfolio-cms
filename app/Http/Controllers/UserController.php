<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class UserController extends Controller
{
    use HasApiTokens;
    public function list()
    {

        return view('users.list', [
            'users' => User::all()
        ]);

    }

    public function addForm()
    {

        return view('users.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = Hash::make($attributes['password']);
        $user->email_verified_at = now();
        $user->save();
        $token = $user->createToken('api-token')->plainTextToken;
        $token = explode('|', $token)[1];
        return redirect('/users/list')
            ->with('message', 'User has been added!')
            ->with('token', $token);
    }

    public function editForm(User $user)
    {

        return view('users.edit', [
            'user' => $user,
        ]);

    }

    public function edit(User $user)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->name = $attributes['name'];
        $user->email = $attributes['email'];

        if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect('/users/list')
            ->with('message', 'User has been edited!');

    }

    public function delete(User $user)
    {

        if($user->id == auth()->user()->id)
        {
            return redirect('/users/list')
                ->with('message', 'Cannot delete your own user account!');        
        }
        
        $user->delete();

        return redirect('/users/list')
            ->with('message', 'User has been deleted!');                
        
    }
}
