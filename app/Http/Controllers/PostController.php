<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Services\PostSerice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
	protected $postService;
	/**
	 * PostController constructor.
	 */
	public function __construct(PostSerice $postSerice)
	{
		$this->postService = $postSerice;
	}
	

    public function create()
    {
	    return view('post.create');
    }

    
    
    public function store(PostRequest $request)
    {
	    $this->postService->create($request);
        return redirect('/home');
        
    }

  

   
    public function edit($id)
    {
        $post=Post::findOrfail($id);
        return view('post.edit',compact('post'));
    }

  
    public function update(UpdatePostRequest $request, $id)
    {
	    $this->postService->update($request,$id);
	    
	    return redirect('/home');
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $this->postService->destroy($id);
    	
    	return back();
    }
}
