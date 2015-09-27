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


    /**
     * the object of current model
     * @var
     */
    public $currentModel ;

    public function __construct(){

        $widgetMenu = new WidgetMenu();
        view()->share('locale',\Lang::getLocale());
        view()->share('locales',\LaravelLocalization::getSupportedLocales());
        view()->share('menu',$widgetMenu->view());

        if(\Session::has('message')){
            $message = \Session::pull('message');
            $onLoad = "new PNotify({title:'".$message['title']."',text:'".$message['message']."',type:'".$message['type']."'});";
            view()->share("onLoad",$onLoad);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = $this->currentModel->find($id);

        if(isset($item->parent_id)){
            $this->currentModel->where(['parent_id'=>$id])->delete();
        }
        $item->delete();

        \Session::put('message.type','success');
        \Session::put('message.title','Deleted');
        \Session::put('message.message','Structure was deleted');

        return ['status'=>'ok'] ;
    }


}