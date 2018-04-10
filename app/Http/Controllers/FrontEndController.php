<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')
                            ->with('settings',Settings::first())
                            ->with('categories',Category::take(5)->get())
                            ->with('first_post',Post::orderBy('created_at','desc')->first())
                            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('allcategories',Category::all()
                        );
    }
    public function singlePost($slug){


        $post = Post::where('slug',$slug)->first();

        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');


        return view('single')
                             ->with('post',$post)
                             ->with('settings',Settings::first())
                             ->with('categories',Category::take(5)->get())
                             ->with('next',Post::find($next_id))
                             ->with('prev',Post::find($prev_id));



    }
    public function category($id){

        $category = Category::find($id);
        return view('category')
                                ->with('settings',Settings::first())
                                ->with('category',$category)
                                ->with('categories',Category::take(5)->get());
    }

}
