<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Hash;
use Input;
use Illuminate\Http\Request;

class UsersController extends Controller { 

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $roles; 
	function __construct(){

		$this->roles = new Role();

	}
	public function index()
	{
		$users =  User::all();
		$data['users'] = $users;
		return view('users.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['roles'] = $this->roles->all();
		return view('users.create',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(empty(Input::get('password'))){
			return redirect()->back()->withInput(Input::all());
		}
		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		if(!$user->save()){
			return redirect()->back();
		}
		$user->roles()->attach(Input::get('role_id'));
		return redirect()->route('users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['user'] = User::find($id);
		$data['user']->role = $data['user']->roles;
		$data['roles'] = $this->roles->all();
		return view('users.create',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		if(!empty(Input::get('password'))){
			$user->password = Hash::make(Input::get('password'));
		}
		if(!$user->save()){
			return redirect()->back();
		}
		$user->roles()->detach();
		$user->roles()->attach(Input::get('role_id'));
		return redirect()->route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//dd($id);
		$user = User::find($id);
		if(!$user->delete()){
			return redirect()->back();
		}
		return redirect()->route('users.index');
	}

}
