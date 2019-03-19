<?php
	/**
	 * Created by PhpStorm.
	 * User: Muhammad Rashid
	 * Date: 19/03/2019
	 * Time: 5:21 PM
	 */
	
	namespace App\Services;
	
	
	use App\Repository\CommentRepository;
	
	class CommentService
	{
		protected $commentRepository;
		
		/**
		 * CommentService constructor.
		 */
		public function __construct( CommentRepository $commentRepository)
		{
			$this->commentRepository=$commentRepository;
		}
		
		public function store($data){
			
			return $this->commentRepository->create($data);
		}
		
		
	}
	
