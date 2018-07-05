<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
class ArticlesController extends Controller
{
    public function index(){
    	$articles = article::all();
    	return view('table')->with("articles",$articles);
    }
    public function store(Request $request){
    	//process ng adding

    	// $article = new article;
    	// $article->title = $request->input('title');
    	// $article->content = $request->input('content');
    	article::create(["title"   => $request->title,
    					"content" => $request->content]);
    	echo "Succesfully Added";
    }
    public function create(){
    	//showing add form
    	return view('addform');
    }
    public function show($id){
    	$article = article::find($id);
    	return view('show')->with("article",$article);
    }
    public function edit($id){
    	$article = article::find($id);
    	return view('editform')->with("article",$article);
    }
    public function update(Request $request, $id){
    	$article = article::find($id);
    	$article->title = $request->title;
    	$article->content = $request->content;
    	if ($article->save()) {
    		echo "Succesfully updated!";
    	}
    }
    public function destroy($id){
    	article::destroy($id);
    	echo "Succesfully Deleted!";
    }
}
