<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
	public function __construct()
	{
		$this->Post = new \App\Models\Post();
	}

	public function index()
	{
		
	}

	public function getdata($postid = FALSE){
		$post 		= new \App\Models\Post();
		if ($postid) {
			if ($postData = $post->getId($postid)) {
				$response	= ['code' => 200, 'post' => $post->getId($postid)];
				return $this->response->setStatusCode(200)->setJSON($response);
			} else {
				$response	= ['code' => 404, 'message' => 'Post not found :('];
				return $this->response->setStatusCode(404)->setJSON($response);
			}
		}
		$response	= ['code' => 200, 'posts' => $post->list()];
		return $this->response->setStatusCode(200)->setJSON($response);
	}

	public function store(){
		$input = $this->request->getPost();

		if ($this->Post->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->Post->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function show($id){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
			
		return $this->response->setJSON($this->Post->find($id));
	}

	public function update($id){
		$input = $this->request->getPost();
		$this->Post->update($id,$input);
		return $this->response->setJSON(["message"=>"data berhasil di update"]);
	}

	public function destroy($id){
		$this->Post->delete($id);
		return $this->response->setJSON(["message"=>"data berhasil di hapus"]);
	}
}
