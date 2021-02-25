<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Attlog extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model');
    }

    //view job
    function index_get($id=null)
    {
        if ($id === null) {
            $result = $this->model->ViewAttlogAPI('attlog');
        } else {
            $result = $this->model->ViewAttlogAPI('attlog', 'attlog', $id);
        }

        if ($result) {
            $this->response([
                'status' => true,
                'data' => $result
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id_not_found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    //delete job
    function index_delete($id=null)
    {
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->model->delete_() > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'deleted'
                ], RestController::HTTP_OK);
            } else {
                //id tidak ditemukan
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    //insert job
    function index_post(){
        $trim_job_id = trim($this->post(''));
        $data = [  ];        
        
    }

    //update job
    function index_put($id=""){
        $data = [];

        
    }
}
