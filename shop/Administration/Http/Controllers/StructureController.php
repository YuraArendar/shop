<?php

namespace Administration\Http\Controllers;

use Administration\Helpers\TreeBuilder;
use Illuminate\Http\Request;

use shop\Http\Requests;
use shop\Http\Controllers\Controller;
use shop\Structure;
use shop\StructureLang;


class StructureController extends BaseController
{

    protected $validation;

    public function __construct(Request $request){
        parent::__construct();

        $this->validation = \Validator::make($request->all(), [
            'name' => 'required:structure|max:255',
        ]);


        view()->share('partition','Structure');
        $structures = Structure::all()->toArray();
        foreach ($structures as $key=>$struct) {
            $lang = StructureLang::where(['structure_id'=>$struct['id'],'language_id'=>\Lang::getLocale()])->first();
            if($lang){
                $structures[$key]['name'] = $lang->name;
            }else{
                unset($structures[$key]);
            }
        }

        $list = [
            0 => 'Root'
        ];
        foreach($structures as $struct){
            $list[$struct['id']] = $struct['name'];
        }

        if(\Session::has('message')){

            $message = \Session::pull('message');
           // \Session::forget('message');
           //dd($message);

            $onLoad = "new PNotify({title:'".$message['title']."',text:'".$message['message']."',type:'".$message['type']."'});";
            view()->share("onLoad",$onLoad);
            //view()->share("onLoad","Main.showMessage('".$message['message']."','".$message['title']."','".$message['message']."')");
        }

        view()->share('listStructures',$list);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $build = new TreeBuilder();
        $structures = Structure::get()->sortBy('position');

        foreach ($structures as $key=>$struct) {
            $lang = StructureLang::where(['structure_id'=>$struct['id'],'language_id'=>\LaravelLocalization::getCurrentLocale()])->first();
            if($lang){
                $structures[$key]->name = $lang->name;
                $structures[$key]->link = action('\Administration\Http\Controllers\StructureController@edit',['id'=>$struct['id']]);
            }else{
                unset($structures[$key]);
            }

        }

        $structures->linkNodes();

        $str =  $structures->toArray();
        $editTemplate = '<span class="edit-buttons pull-right">'.
            '<a href="{link}" style="z-index: 10000;" class="on-default edit-row"><i class="fa fa-pencil"></i></a>'.
            '<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a></span>';
        $view = $build->view(
            $str,
            '<ol class="dd-list">{val}</ol>',
            '<li class="dd-item" data-id="{id}">'.$editTemplate.'<div class="dd-handle">{name}</div></li>',
            '<li class="dd-item" data-id="{id}">'.$editTemplate.'<div class="dd-handle">{name}</div><ol class="dd-list">{|}</ol></li>'
            );

        $structures = Structure::all()->toArray();



        view()->share('scripts', [
            '<script src="/assets/cms/vendor/jquery-nestable/jquery.nestable.js"></script>',
            '<script src="/assets/cms/javascripts/ui-elements/examples.nestable.js"></script>'
        ]);

        return view('administration::structure.index',compact('view'));
    }

    public function rebuild(Request $request){

        $build = new TreeBuilder();

        $data =json_decode($request->input('data'),true);

        $newRelations = $build->generateRelations($data);
        foreach($newRelations as $item){
            $struct = Structure::find($item['id']);
            $struct->parent_id = $item['parent_id'];
            $struct->position = $item['position'];
            $struct->save();
        }

        Structure::fixTree();

        return $newRelations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('administration::structure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validation->mergeRules('alias',[
            'required',
            'regex:/^[a-zа-я\d-]+$/',
            'unique:structure',
            'max:255']
        );
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $structure =  new Structure();

        $data = $request->all();

        $structure->alias = $data['alias'];
        $structure->parent_id = $data['parent_id'];
        $structure->controller = $data['controller'];


        $structure->save();
        $structure->structureLang()->create([
            'name'=>$data['name'],
            'language_id'=>$data['language_id'],
            'description'=>$data['description']
        ]);

        \Session::put('message.type','success');
        \Session::put('message.title','Saved');
        \Session::put('message.message','Structure was saved');


        \Log::error('$structure->id ',[$structure->id]);
        return ['redirect'=>action('\Administration\Http\Controllers\StructureController@edit',['id'=>$structure->id])];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $structure = Structure::with('structureLang')->find($id)->toArray();

        $lang = StructureLang::where('structure_id',$id)
            ->where('language_id',\LaravelLocalization::getCurrentLocale())
            ->first()
            ->toArray();

        $structure['lang'] = $lang;

        return view('administration::structure.edit',compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $this->validation->mergeRules('alias','required|regex:[a-zа-я-\d]+|max:255');
        if($this->validation->fails()){
            return $this->validation->errors()->toJson();
        }
        $objectStructure = Structure::find($id);

        $data = $request->all();

        $objectStructure->alias = $data['alias'];
        $objectStructure->parent_id = $data['parent_id'];
        $objectStructure->controller = $data['controller'];

        $langStructure =  StructureLang::where('structure_id',$id)
            ->where('language_id',\LaravelLocalization::getCurrentLocale())
            ->first();
        $langStructure->name = $data['name'];
        $langStructure->description = $data['description'];

        $objectStructure->save();
        $langStructure->save();


        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Structure::where(['parent_id'=>$id])->delete();
        $struct = Structure::find($id);
        $struct->delete();
        $message = [
            'type'=>'succes',
            'title'=> 'Deleted',
            'message'=>'Structure was deleted'
        ];
        return $message ;
    }

}
