<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

use DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{ public function index()
    {
      if(Auth::user()->hasRole('hall')){
        $user = Auth::user();
        $Posts=Post::with('user')->where('user_id', $user->id)->orderBy('created_at','desc')->paginate(3);
        return view('dashboard.Post')->with('Posts',$Posts);
      
      }
      if(Auth::user()->hasRole('superadministrator')){
        $user = Auth::user();
        $Posts=Post::with('user')->where('admin_id', '1')->orderBy('created_at','desc')->paginate(3);
        $PostUser=Post::all()->where('admin_id','0');
        
        return view('AdminDashboard.PostAdmin')->with('Posts',$Posts)->with('PostsUser' ,$PostUser);
      }
      
     
     
        
       
      //  $Post =Post::orderBy('created_at','desc')->paginate(3);
    
      
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    if(Auth::user()->hasRole('hall')){
        return view ('dashboard.Post');
    }
    if(Auth::user()->hasRole('superadministrator')){
        return view ('AdminDashboard.PostAdmin');}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::user()->hasRole('hall')){
        $user = Auth::user();
        $Post=new Post;
     
        if (request()->img){
          $img_path = $request->file('img')->store('media', 'public');
          $Post->img = $img_path;
        }
        
        $Post->title=$request->input('title');
        $Post->body=$request->input('body');
        $Post->user_id= auth()->id();
        $Post->admin_id=(0);
        $Post->save();
     //post::create(request()->all());

        return redirect('/Post')->with('success', ' تم  النشر!');
        
      }
      if(Auth::user()->hasRole('superadministrator')){
        $user = Auth::user();
       
        $Post=new Post;
     
        if (request()->img){
          $img_path = $request->file('img')->store('media', 'public');
          $Post->img = $img_path;
        }
        
        $Post->title=$request->input('title');
        $Post->body=$request->input('body');
   
        $Post->user_id= (0);
        $Post->admin_id=(1);
        $Post->save();
  

   return redirect('/PostAdmin')->with('success', ' تم  النشر!');
      }
  
        
    }



    public function update(Request $request, $id)
    {
      if(Auth::user()->hasRole('hall')){
        $user = Auth::user();
  
        $Post =Post::find($id);
        if (request()->img){
          $img_path = $request->file('img')->store('media', 'public');
          $Post->img = $img_path;
        }
        $Post->title=$request->input('title');
        $Post->body=$request->input('body');
      
        $Post->user_id= auth()->id();
        $Post->admin_id=(0);
       $Post->save();
     //post::create(request()->all());
  
 
  
        return redirect('/Post')->with('success', ' تم  النشر!');
        
      }
      if(Auth::user()->hasRole('superadministrator')){
      $user = Auth::user();
        if (request()->img){
          $img_path = $request->file('img')->store('media', 'public');
          $Post->img = $img_path;
        }
        $Post =Post::find($id);
        $Post->title=$request->input('title');
        $Post->body=$request->input('body');
     
        $Post->user_id=  (0);
        $Post->admin_id= (1);;
       $Post->save();
     //post::create(request()->all());
  
 
  
        return redirect('/PostAdmin')->with('success', ' تم  النشر!');
      
      }
  
        
    }



    public function destroy($id)
    {
        $Post =Post::find($id);
        $Post->delete();
        return redirect()->back()->with('success', ' تم الحدف !');
    }



    public function viewDetail(Request $request){

      if($request->get('id'))
      {
          $id = $request->get('id');
          
          $Post = DB::table("post")
          ->where('id', $id)
          ->first();
          $output = '<div>' . $Post->title . '</div>';
          $output .= '<div>' . $Post->created_at . '</div><hr>';
          $output .= '<div>' . $Post->body . '</div>';
          echo $output;


      }


  }







}