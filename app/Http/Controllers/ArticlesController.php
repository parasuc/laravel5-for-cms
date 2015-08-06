<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Input;
use Auth;
use App\Articles;
use Request;
//use Illuminate\Http\Request;

class ArticlesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	function __construct(){
		parent::__construct();
		$this->article = new Articles();
	}
	public function index()
	{
		$articles = $this->article->get();
		foreach ($articles as $key => $article) {
			$articles[$key]->categoryname = $this->article->find($article->id)->category;
		}
		$data['articles'] = $articles;
		return view('article.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['cates'] = $this->allcate(0);
		return view('article.create',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$uploadFile = Request::file('image');
		/*if($uploadFile->isValid()){
			$imagename = sha1(str_random()).'.'.$uploadFile->getClientOriginalExtension();
			if($uploadFile->move('Upload/article/'.date('Ym'),$imagename)){
				$data['image'] = 'Upload/article/'.date('Ym').'/'.$imagename;
			}
		}*/
		$data['image'] = $this->imgaeUpload($uploadFile);
		$this->article->title = Request::input('title');
		$this->article->slug = Request::input('slug');
		$this->article->user_id = Auth::user()->id;
		$this->article->category_id = Request::input('category_id');
		$this->article->description = Request::input('description');
		$this->article->body = Request::input('body');
		$this->article->image = $data['image'];
		if(!$this->article->save()){
			return redirect()->back();
		}
		return redirect()->route('articles.index');
	}

	private function imgaeUpload($uploadFile){
		if($uploadFile->isValid()){
			$imagename = sha1(str_random()).'.'.$uploadFile->getClientOriginalExtension();
			if($uploadFile->move('Upload/article/'.date('Ym'),$imagename)){
				return 'Upload/article/'.date('Ym').'/'.$imagename;
			}
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
		$article = $this->article->find($id);
		$data['cates'] = $this->allcate(0);
		//dd($article);
		$data['article'] = $article;
		return view('article.create',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$article = $this->article->find($id);
		if (Request::hasFile('image')){
		    $uploadFile = Request::file('image');
		    $data['image'] = $this->imgaeUpload($uploadFile);
		    $article->image = $data['image'];
		}		
		$article->title = Request::input('title');
		$article->slug = Request::input('slug');
		$article->user_id = Auth::user()->id;
		$article->category_id = Request::input('category_id');
		$article->description = Request::input('description');
		$article->body = Request::input('body');
		if(!$article->save()){
			return redirect()->back();
		}
		return redirect()->route('articles.index');
		//dd($article);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if($this->article->find($id)->delete()){
			return redirect()->route('articles.index');
		}
		return redirect()->back();
	}

}
