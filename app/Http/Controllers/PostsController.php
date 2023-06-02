<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query builder methods
        // $posts=DB::select('Select * FROM posts  WHERE id=2');
        // $posts=DB::insert('INSERT INTO posts (title,excerpt,body,image_path,is_published,min_to_read) VALUES(?,?,?,?,?,?)',[
        //     'Test','test','test','test',true, 1
        // ]);
        // $posts=DB::update('UPDATE posts set body =? where id=?',[
        //     'Body 3',101
        // ]);

        // $posts=DB::delete('DELETE FROM posts where id =?',[101]);
        // $posts=DB::table('posts')->find(1);
    //    different query builders method to find data from db
        // ->first()
        // ->where('id',100)
        // ->value('body')
        // ->select('title','image_path')
        // ->where('id','>',93)
        //  ->orderBy('id','desc')
        //  ->whereBetween('min_to_read',[2,5])
        // ->get();
        // dd($posts);
        // return view('blog.index')->with('posts',$posts);// method for viewing in front end
        
        
        
        
        /// retreving data using eloquent
        // $posts= Post::all();
        // dd($posts);
        // $posts=Post::orderBy('id','desc')->take(10)->get();
        // dd($posts);
        // $posts=Post::where('min_to_read','!=',2)->get();
        // dd($posts);
        //  $posts=Post::get()->count();
        $posts=Post::sum('min_to_read');
        $posts=Post::avg('min_to_read');
         dd($posts);

        //using chunk 


    //     Post::chunk(25, function($posts){
    //     foreach($posts as $post){
    //    echo $post->title ;
    //     }
    //     });


        return view('blog.index',[
            'posts'=>Post::orderBy('updated_at','desc')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show',[
        'post'=>Post::findOrfail($id)
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
