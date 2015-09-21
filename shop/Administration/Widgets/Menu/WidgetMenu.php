<?php
namespace Administration\Widgets\Menu;

use Illuminate\Support\Facades\Config;

class WidgetMenu {

    /**
     * array from configuration file
     * for build menu
     * @var array
     */
    protected $config = [];

    public function __construct(){

        $this->config = Config::get('menu');

    }

    public function view(){


        return view('menu::menu')->with('menu',$this->config);

    }

}