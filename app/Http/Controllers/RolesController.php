<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Input;
use App\Permission;
use Illuminate\Http\Request;

class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $roles;
	private $per;
	function __construct(){
		$this->roles = new Role();
		$this->per = new Permission();
	}
	public function index()
	{
		$roles = $this->roles->all();
		foreach($roles as $key=>$role){
			$roles[$key]->pres = $role->perms;
		}
		$data['roles']= $roles;
		return view('role.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['permission'] = $this->per->select('id', 'name')->get();
		return view('role.create',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->roles->name         = Input::get('name');
		$this->roles->display_name = Input::get('display_name'); // optional
		$this->roles->description  = Input::get('description'); // optional
		$r = $this->roles->save();
		if(!$r){
			return redirect()->back();
		}
		$re = $this->roles->perms()->sync(Input::get('perms'));
		if($re){
			return redirect()->route('role.index');
		}
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
		$data['roles'] = $this->roles->find($id);
		$data['roles']->pres = $data['roles']->perms;
		$data['permission'] = $this->per->select('id', 'name')->get();
		return view('role.create',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//var_dump(Input::all());
		//dd($id);
		$r = $this->roles->find($id);
		$r->name = Input::get('name');
		$r->display_name = Input::get('display_name');
		$r->description = Input::get('description');
		if(!$r->save()){
			return redirect()->back();
		}
		$r->perms()->sync(Input::get('perms'));
		return redirect()->route('roles.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$r = $this->roles->find($id);
		if(!$r->delete()){
			return redirect()->back();
		}
		return redirect()->route('roles.index');
	}

}
