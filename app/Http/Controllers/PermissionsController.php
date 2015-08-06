<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use Input;
use Illuminate\Http\Request;

class PermissionsController extends Controller {
	private $per;
	function __construct(){
		$this->per = new Permission();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$perms = $this->per->all();
		$data['perms'] = $perms;
		return view('permission.index',$data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permission.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->per->name         = Input::get('name') ;
		$this->per->display_name = Input::get('display_name'); // optional 
		$this->per->description  = Input::get('description'); // optional
		if($this->per->save()){
			return redirect()->route('permissions.index');
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
		$reuslt = $this->per->find($id);
		$data['per'] = $reuslt;
		return view('permission.create',$data);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
            $permission = $this->per->find($id);
            $permission->name = Input::get('name');
            $permission->display_name = Input::get('display_name');
            $permission->description = Input::get('description');
            if($permission->save()){
            	return redirect()->route('permissions.index');
            }
        }catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$per = $this->per->findOrFail($id);
		if(!$per->forceDelete()){
			return redirect()->route('permissions.index');
		}
	}

}
