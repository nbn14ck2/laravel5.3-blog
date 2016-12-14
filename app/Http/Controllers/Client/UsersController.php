<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Users\UserEditRequest;
use App\Http\Requests\Users\AvatarRequest;
use App\Http\Requests\Users\ChangepwdRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        return view('client.account.index');
    }

    public function Edit($id) {
        return view('client.account.change_info');
    }

    public function Update(UserEditRequest $request, $id){
        $user = DB::table('users')->where('id', $id)
            ->update([
                'name'      => $request->name,
                'gender'    => $request->gender,
                'like'      => $request->like,
                'slogan'    => $request->slogan
            ]);

        return redirect('user/'.$id)->with(['status' => 'Upload info was successful!']);
    }

    public function update_avatar(AvatarRequest $request, $id) {
        $imageName = time().'.'.$request->Imagefile->getClientOriginalExtension();
        $request->Imagefile->move(public_path('resources/user'), $imageName);

        $user = DB::table('users')->where('id', $id)
            ->update([
                'avatar'    => $imageName
            ]);

        return redirect('user/'.$id)->with(['status' => 'Upload avatar was successful!']);
    }

    public function change_password(ChangepwdRequest $request, $id) {
        $current_password = Auth::user()->password;
        //  echo $current_password;
         $verify_password = $request->verify_password;
        //  $verify_password = Hash::make($verify_password);
        //  echo $verify_password;
         

        if(!Hash::check($verify_password, $current_password))
        {           
            echo "sai pass roi";
            // return redirect('user/'.$id)->with('status', 'current password');
        }else {
            echo 'dung pass r';
        }
        // return redirect('user/'.$id);
    }
}