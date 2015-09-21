<?php
namespace Administration\Http\Controllers;

use Administration\Widgets\Menu\WidgetMenu;
use shop\Http\Controllers\Controller;
use shop\Language;

class BaseController extends Controller{

    /**
     * array for data for to send to views
     * @var array
     */
    public $dataView = [];



    public function __construct(){

        $widgetMenu = new WidgetMenu();
        view()->share('locale',\Lang::getLocale());
        view()->share('locales',\LaravelLocalization::getSupportedLocales());
        view()->share('menu',$widgetMenu->view());

        //view()->share('csrf_token',csrf_token());

    }


}