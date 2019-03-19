<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Repository\CommentRepository;
use App\Services\CommentService;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	protected $commentService;
	/**
	 * CommentController constructor.
	 */
	public function __construct( CommentService $commentService)
	{
		$this->commentService= $commentService;
	}
	
	

    public function store(Request $request)
    {
    	
    	$this->commentService->store($request);
    	
       
        return back();
        
        
    }

 
}
