<?php
	/**
	 * Created by PhpStorm.
	 * User: Muhammad Rashid
	 * Date: 19/03/2019
	 * Time: 4:04 PM
	 */
	
	namespace App\Repository;
	
	
	use App\Post;
	
	class PostRepository
	{
		
		 protected $post;
		/**
		 * PostRepository constructor.
		 */
		public function __construct(Post $post)
		{
			$this->post = $post;
		}
		public function create($data)
		{
			return $this->post->create($data);
		}
		
		public function update(  $data,$id)
		{
			
			$post=Post::findOrfail($id);
			$post->update($data);
			
			return ;
		}
		
		public function destroy( $id)
		{
			$post=Post::findOrfail($id);
			$post->delete();
			return ;
		}
		
	}
