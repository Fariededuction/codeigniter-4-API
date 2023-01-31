<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Modeltesting;

class TestingApi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $modelTest = new Modeltesting();
        $data = $modelTest->findall();
        $response =[
            'status' => 200,
            'error' => "false",
            'message' => 'ada data!',
            'totaldata'=> count($data),
            'data' => $data,
        ];
        return $this->respond($response, 200);
        
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($cari = null)
    {
        $modelTest = new Modeltesting();

        $data = $modelTest->orLike('id', $cari)
        ->orLike('nama_test',$cari)->get()->getResult();

        if(count($data)>1){
        $response =[
            'status' => 200,
            'error' => "false",
            'message' => 'ada data!',
            'totaldata'=> count($data),
            'data' => $data,
        ];
        return $this->respond($response, 200);
    }else if (count($data)===1){

        $response =[
            'status' => 200,
            'error' => "false",
            'message' => 'ada data!',
            'totaldata'=> count($data),
            'data' => $data,
        ];
            return $this->respond($response, 200);
    } else {
            return $this->failNotFound('maaf data' .$cari. 'tidak ditemukan');
    }
}

    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
