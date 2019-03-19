<?php
	/**
	 * Created by PhpStorm.
	 * User: Muhammad Rashid
	 * Date: 19/03/2019
	 * Time: 4:06 PM
	 */
	
	namespace App\Services;
	
	
	use App\Post;
	use App\Repository\PostRepository;
	use Illuminate\Support\Facades\Auth;
	
	class PostSerice
	{
		
		protected $postRepository;
		/**
		 * PostSerice constructor.
		 */
		public function __construct(PostRepository $postRepository)
		{
			$this->postRepository = $postRepository;
		}
		
		public function create($request)
		{
			if($request->hasFile('image')) {
				
				$destinationPath = 'images';
				$filename = time() . '.' . $request->image->getClientOriginalName();
				$request->image->move($destinationPath, $filename);
				$request->image=$filename;
			}
			
			
			$post=array();
			$post['title']=$request->title;
			$post['description']=$request->description;
			$post['image']=$request->image;
			$post['user_id']=Auth::user()->id;
			return $this->postRepository->create($post);
		}
		
		
		public function update($request, $id)
		{
			
			$post=array();
			
			if($request->hasFile('image')) {
				$destinationPath = 'images';
				$filename = time() . '.' . $request->image->getClientOriginalName();
				$request->image->move($destinationPath, $filename);
				$request->image=$filename;
				$post['image']=$request->image;
			}
			
			
			
			
			$post['title']=$request->title;
			$post['description']=$request->description;
			$post['user_id']=Auth::user()->id;
			return $this->postRepository->update($post,$id);
		}
		
		
		public function destroy($id){
			return $this->postRepository->destroy($id);
		}
		
	}
