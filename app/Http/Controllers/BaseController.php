<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use View;
use Illuminate\Http\Request;

class BaseController extends Controller {
	Protected $category;
	Protected $arr = array();
	function __construct(){
		$this->category = new Category();
	}
	Protected function allcate($id = 0){
		$arr = $this->get_array($id);
		$onearr = $this->arr($arr);
		return $onearr;
	}
	Protected function arr($array){
		static $result_array=array();
		foreach ($array as $k => $v) {
			if($v['list'] && is_array($v['list'])){
				$this->arr($v['list']);
				unset($v['list']);
				$result_array[]=$v;
			}else{
				unset($v['list']);
				$result_array[]=$v;
			}
		}
		return array_reverse($result_array);
	}
	Protected function get_array($id = 0,$num=0) {
		$arr = array();
		$cates = $this->category->where('pid',$id)->get()->toArray();
		if($cates){
			foreach ($cates as $key => $cate) {
				
				if($cate['pid'] == 0){
					$cate['name'] = "".str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $num * 2)."|——".$cate['name'];
					$count = 0;
				}else{
					$cate['name'] = "|".str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $num * 2)."|——".$cate['name'];
					$count = $num;
				}
				$cate['list'] = $this->get_array($cate['id'],++$count);
				$arr[] = $cate;
			}
		}
    	return $arr; 
	}
}
