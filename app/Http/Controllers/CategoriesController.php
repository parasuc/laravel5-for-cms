<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Category;
use Input;
use Illuminate\Http\Request;

class CategoriesController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['cates'] = $this->allcate(0);
		return view('category.index',$data);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		//$id = Request::get('id');
		//dd($id);
		$data['cates'] = $this->allcate(0);
		return view('category.create',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->category->pid = Input::get('pid');
		$this->category->name = Input::get('name');
		$this->category->slug = Input::get('slug');
		$this->category->description = Input::get('description');
		if( $this->category->save() ){
			return redirect()->route('categories.index');
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
		$data['cate'] = $this->category->find($id);
		$data['cates'] = $this->allcate(0);
		return view('category.create',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = $this->category->find($id);
		$category->pid = Input::get('pid');
		$category->name = Input::get('name');
		$category->slug = Input::get('slug');
		$category->description = Input::get('description');
		if( $category->save() ){
			return redirect()->route('categories.index');
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
		if(!$id){
			return redirect()->back();
		}
		$cates = $this->allcate($id);
		if(!$cates){
			$this->category->where('id',$id)->delete();
			return redirect()->route('categories.index');
		}else{
			if($this->category->where('id',$id)->delete()){
				$te = $this->category->where(function($query)use($cates){
		        	foreach($cates as $v){
		        		$query->orWhere('id','=',$v['id']);
		        	}
	       		})->delete();
	       		if($te){
	       			return redirect()->route('categories.index');
	       		}
			}
			return redirect()->back()->with('mssage','删除失败！');
		}
	}
}
