<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class NewsController extends Controller
{
    public function create(Request $request) {
        $validate = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        // dd($request);
        
        $news = new News();
        $news->title = $request->title;
        $news->type = $request->type;
        $news->description = $request->description;
        
        if ($news->save()) {
            // redirect back();
            \Session::flash('news_success', 'News created successfully.');
        }
        return Redirect::away('/admin/news');
    }
    
    public function edit(Request $request, $id) {
        $validate = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $news = News::find($id);
        $news->type = $request->get('type');
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        
        if ($news->save()) {
            \Session::flash('news_success', 'Updated News successfully.');
        }
        return Redirect::away('/admin/news');
        
    }
    
    public function findAll() {
        $news = \DB::table('news')->orderBy('created_at', 'desc')->get();
        return view('admin.news')->with('news', $news);
    }
    
    public function allNews() {
        $news = \DB::table('news')
                ->where('type','general')
				->orderBy('created_at', 'desc')
                ->get();
        return view('news')->with('news', $news);
    }
    
    public function removeNews($id) {
        $news = News::find($id);
        
        if ($news->delete()) {
            \Session::flash('news_success', 'News deleted successfully.');
        }
        return Redirect::away('/admin/news');
    }
    
}
