<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = DB::SELECT('SELECT * FROM posts');
       //return  post::all();
       //$posts = post::all();
       //$posts = post::where('title','Post two')->get();
      // return  dd(gettype($posts));
      $posts = post::orderBy('created_at','desc')->paginate(10);
      //$topics = Topic::with('posts')->orderBy('posts.created_at')->get();

      //$posts = post::orderBy('title','desc')->get();
      //$posts = post::orderBy('title','desc')->take(1)->get();
    return view('posts.index')->with('posts',$posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       {
        $this->validate($request,[
            'description'=>'required',
            'price'=>'required',
            'rating'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
       ]);
       // hadle file appload
       if ($request->hasFile('image')) {

        $filenameWithExt = $request->file('image')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        // Else add a dummy image
        else {
        $fileNameToStore = 'noimage.jpg';
        }
        //create product
        $post = new Post;
        $post ->user_id == auth()->user()->id;
        $post ->description =$request->input('description');
        $post ->price =$request->input('price');
        $post ->rating =$request->input('rating');
        //$post->user_id = $request->get("user_id");
        $post ->image =$fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success','product created');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post',$post);

        //return view ('posts.show')->with('posts',$post->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $post = Post::find($id);

  if(auth()->user()->id !==$post->user_id){
      return redirect('/posts')->with('error','Unauthorised Page');
  }

        return view('posts.edit')->with('post', $post);

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
        $this->validate($request,[
            'title'=>'required',
               'body'=>'required'
        ]);
        //create post
        $post =Post::find($id);
        $post ->title =$request->input('title');
        $post ->body =$request->input('body');
        $post->save();
        return redirect('/posts')->with('success','post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $post = Post::find($id);

  if(auth()->user()->id !==$post->user_id){
      return redirect('/posts')->with('error','Unauthorised Page');
  }

    
        $post->delete();
        return redirect('/posts')->with('success','post removed');

    }
}
