<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Premium;
use App\Playlist;
use App\PlaylistSerie;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function profile(){
        $user = Auth::user();
        if($user!=null){
        $user->premium = DB::table('premia')->where('user_id',$user->id)->first();

        //return $user;
        return view('profile')->with('user',$user);
        }else{
            return redirect()->back();
        }
    }

    public function changePassword(Request $request){
        $this->validate($request,[
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newPassword);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('succMsg','Lozinka je promijenjena.');
        }else{
            return redirect()->back()->with('errMsg','Greška.');
        }
    }

    public function premium(){
        return view('auth.premium');
    }

    public function activatePremium(Request $request){
        $this->validate($request,[
            'number' => 'numeric',
            'pin' => 'numeric'
        ]);

        $old = Premium::where('user_id',Auth::id())->first();

        if($old!==null){
            return redirect()->back()->with('errMsg','Već ste PREMIUM korisnik.');
        }else{
            $check = DB::table('cards')->where('number',$request->number)->first();
            if($check!==null){
                if($check->pin!=$request->pin){
                    return redirect()->back()->with('errMsg','Unijet je netačan PIN.');
                }else{
                    if($check->status<5.99){
                        return redirect()->back()->with('errMsg','Nemate dovoljno novca.');
                    }else{
                        $premium = new Premium;
                        $premium->user_id = Auth::id();
                        $premium->number = $request->number;
                        $premium->pin = Hash::make($request->pin);

                        $premium->save();

                        return $this->profile();
                    }
                }
            }else{
                return redirect()->back()->with('errMsg','Unijeti su podaci nevažeće kartice.');
            }
        }
    }

    public function deletePremium(Request $request){
        $this->validate($request,[
            'password2' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->password2,$hashedPassword)){
            Premium::where('user_id',Auth::id())->delete();
            return $this->profile()->with('msg','Premium nalog je obrisan.');
        }else{
            return $this->profile()->with('msg','Greška!');
        }
    }

    public function deleteProfile(Request $request){
        $this->validate($request,[
            'password1' => 'required'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->password1,$hashedPassword)){
            User::where('id',Auth::id())->delete();
            Auth::logout();
            return view('auth.login');
        }else{
            return $this->profile()->with('msg','Greška!');
        }
    }

    public function changeName(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->save();
        return redirect()->back();
    }

    public function changePhoto(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $name = time().'.'.$request->picture->extension();  
   
        $request->picture->move(public_path('profiles'), $name);

        $user = User::find(Auth::id());
        $user->picture = 'profiles/'.$name;
        $user->save();
        
        return back();
    }

    public function playlist(){
        $user = Auth::user();
        if($user!=null){
            $user->premium = DB::table('premia')->where('user_id',$user->id)->first();
            if($user->premium!=null){
            $user->moviePlaylists = Playlist::where('user_id',$user->id)->get();
            foreach($user->moviePlaylists as $play){
                $play->movie = $play->movie()->first();
            }

            $user->episodePlaylists = PlaylistSerie::where('user_id',$user->id)->get();
            foreach($user->episodePlaylists as $play){
                $play->episode = $play->episode()->first();
                $play->episode->season = $play->episode->season()->with('serie')->first();
            }

            return view('playlist')->with('user',$user);
            //return $user;
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
