<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KomentarController extends BaseController
{
	public function __construct()
	{
		$this->Komentar = new \App\Models\Komentar();
	}

	public function index()
	{
		
	}

	public function getdata(){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		$filter = $this->request->getGet('keyword');
		$data = [];

		if($filter){
			var_dump("tes");
			$data = $this->Komentar->findAll();
		}else
			$data = $this->Komentar->findAll();

		return $this->response->setJSON($data);
	}

	public function store(){
		$input = $this->request->getPost();

		if ($this->Komentar->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->Komentar->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function show($id){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
			
		return $this->response->setJSON($this->Komentar->find($id));
	}

	public function update($id){
		$input = $this->request->getPost();
		$this->Komentar->update($id,$input);
		return $this->response->setJSON(["message"=>"data berhasil di update"]);
	}

	public function destroy($id){
		$this->Komentar->delete($id);
		return $this->response->setJSON(["message"=>"data berhasil di hapus"]);
	}

}
