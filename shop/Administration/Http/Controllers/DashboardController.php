<?php
namespace Administration\Http\Controllers;

class DashboardController extends BaseController{


    public function index(){


       /// dd($this->dataView);

        return view('administration::layout.layout')->with('data',$this->dataView);

    }

}