<?php
    class Pages extends Controller {

        public function __construct(){

        }

        public function index(){
            $data = [
                'title' => 'BookIt',
                'description' => 'A simple application that lets you set appointments with contractors.'
            ];

            $this->view('pages/index', $data);
        }

//        public function register() {
//            $this->view('pages/register');
//        }
    }