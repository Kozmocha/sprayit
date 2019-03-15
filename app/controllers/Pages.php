<?php
    class Pages extends Controller {

        public function __construct(){

        }

        public function index(){
            $data = ['title' => 'BookIt'];

            $this->view('pages/index', $data);
        }

        public function registerClient(){
            $data = ['title' => 'Register'];
            $this->view('pages/register-client', $data);
        }
    }