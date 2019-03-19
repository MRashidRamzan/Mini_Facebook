<?php
	/**
	 * Created by PhpStorm.
	 * User: Muhammad Rashid
	 * Date: 19/03/2019
	 * Time: 5:19 PM
	 */
	
	namespace App\Repository;
	
	
	use App\Comment;
	use Illuminate\Support\Facades\Auth;
	
	class CommentRepository
	{
		
		protected $comment;
		
		/**
		 * CommentRepository constructor.
		 */
		public function __construct( Comment $comment)
		{
			$this->comment=$comment;
		}
		
		
		public function create($data){
			$comment=new Comment();
			$comment->comment=$data->comment;
			$comment->post_id=$data->id;
			$comment->user_id=Auth::user()->id;
			$comment->save();
			return ;
		}
		
	}
