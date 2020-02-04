<?php

namespace App\Http\Controllers;
use App\Contracts\Services\User\UserServiceInterface;
use Auth;
use Hash;
use App\Rules\Password;
use Illuminate\Http\Request;
use App\Http\Requests\UserConfirmRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Services\User\UserService;
use App\Models\Users;

class UserController extends Controller
{

    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param userServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show User Create Form
     *
     * @return void
     */
    public function index () {
        return view('user.usercreate');
    }

    /**
     * user create confirm Function
     *
     * @param Request $request
     * @return void
     */
    public function confirm (UserConfirmRequest $request) {
        $validator = $request->validated();
        $user = $this->userService->confirm($request);
        return view('user.userconfirm', compact('user'));
    }

    /**
     * store user Function
     *
     * @param Request $request
     * @return void
     */
    public function store (Request $request) 
    {
        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('users'),
            ],
        ]);   
        $user = new Users;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('password');
        $hash = bcrypt($password);
        $user->password = $hash;
        $user->profile = $request->file ;
        $user->type = $request->type;
        $user->phone = $request->input('phone');
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->create_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        // $user = $this->userService->store($request);
        return redirect('userlist');
    }

    function show () {
        $user = new Users;
        $user = Users::with('users')->paginate(10);
        return view('user.userlist', ['user' => $user]);
    }

    function destroy ($id) {
        $del = Users::find($id);
        $del = DB::delete('delete from users where id = ?',[$id]);
        return redirect()->back();
    }

    function search(Request $request) {
        $name = $request->get('name');
        $email = $request->get('email');
        $from = $request->get('from');
        $to = $request->get('to');
        $user = Users::where ('name', 'LIKE', '%' . $name . '%' )
        ->Where ('email', 'LIKE', '%' . $email . '%' )
        ->orWhereBetween('created_at', [$from, $to])
        ->orderby('id', 'DESC')
        ->paginate(5);
        return view('user.userlist',compact('user'));
    }

    function update_user() {
        $user = Users::find(Auth::user()->id);
        return view('/user.userupdate',[ 'user' => $user ]);
    }

    function update_user_confirm (Request $request) 
    {
        $user = Users::find($request->id);
        $user = new Users;
        $user->name = $request->name;
        $user->email = $request->email;

        $profile = $request->file('file');
        $profileImage = $profile -> getClientOriginalName();
        $path = public_path('/image');
        $profile -> move($path, $profileImage);

        $user->file = $profileImage;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        return view('user.userupconfirm', compact('user'));
    }

    function update (Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore(Auth::user()->id),
            ],
        ]);
        $user = Users::find($request->id);
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile = $request->file ;
        $user->type = $request->type;
        $user->phone = $request->input('phone');
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->create_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect('userlist');
    }

    function change_password (Request $request)
    {
        $user = Users::find($request->id);
        return view('user.change_password', compact('user'));
    }

    function changed_new_password(ChangePasswordRequest $request) 
    {
        $validator = $request->validated();
        $user = Users::find($request->id);
        $user = Auth::user();
        $password = $request->new_password;
        $user->password = bcrypt($password);
        $user->save();
        return redirect('userlist');
    }   

    
}