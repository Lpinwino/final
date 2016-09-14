<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditFormRequest;
use App\User;
use App\Event;
use App\Role;
use App\Post;
use Hash;

class UsersController extends Controller{

	private $user;

	public function __construct(User $user){
        $this->middleware('auth');
        $this->user = $user;
	}


    public function director()
    {
    if(Auth::user()->hasRole('directivos'))
        return view('backend.directivos');
    else
        return redirect('/');
    }

    public function directorUsuarios()
    {
        $users = User::all();
        return view('director.historialusuarios', compact('users'));
    } 

    public function viewUser( $id ){
    	if(User::find($id)){
    		$events = Event::where('user_id', $id)->get();
    		return view('director.eventoslista', compact('events'));
    	}else{
    		return 'no existe';
    	}
    }

	public function directory(){
		$users = User::all();
		return view('directory.users', compact('users'));
	}

	public function show( $id = null ){
		$user = Auth::user();
		if(isset($id)){
			//Buscar id de usuario
			$user = $this->user->whereId($id)->first();

			if(!$user)
				return "error";
			//Si no existe id en usuario mostrar pagina de error.
		}
		return view('backend.users.view', compact('user'));
	}

	public function edit($id)
	{
		$user = User::whereId($id)->first();
		$roles = Role::all();
		$selectedRoles = $user->roles->lists('id')->toArray();
		return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
	}

	public function update($id, UserEditFormRequest $request)
	{
		$user = User::whereId($id)->firstOrFail();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->department = $request->get('department');
		$user->phone = $request->get('phone');
		$password = $request->get('password');
		if($password != "") {
			$user->password = Hash::make($password);
		}

        $image = $this->saveImage($request);
        if($image){
        	$user->picture = $image;
    	}
		$user->save();
		$user->saveRoles($request->get('role'));
		return redirect(action('Admin\UsersController@edit', $user->id))->with('status', 'The user has been updated!');
	}

	public function saveImage($request)
    {
        if(!$request->hasFile('picture'))
        {
			return false;
        }

        $mime = $request->file('picture')->getMimeType();
        $extension = strtolower($request->file('picture')->getClientOriginalExtension());
        $fileName = uniqid().'.'.$extension;
        $path = "files_uploaded";

        switch ($mime)
        {
            case "image/jpeg":
            case "image/png":
                if ($request->file('picture')->isValid())
                {
                    $request->file('picture')->move($path, $fileName);
                    return $fileName;
                }
                break;
            default:
                return false;
        }
    }



}
