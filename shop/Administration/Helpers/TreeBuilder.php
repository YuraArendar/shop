<?php namespace Administration\Helpers;

class TreeBuilder{

    protected $treeHTML;

    protected $templateMain = '';

    protected $templateSingle = '';

    protected $templateMulti ='';

    protected $relations =[];


    public function view($items,$templateMain,$templateSingle,$templateMulti){
        $this->templateMain = $templateMain;
        $this->templateSingle = $templateSingle;
        $this->templateMulti = $templateMulti;

        foreach($items as $key=>$item)
            if($item['parent_id'])
                unset($items[$key]);

        $this->move($items);

        return str_replace('{val}',$this->treeHTML,$templateMain);
    }


    protected function move($items){
        foreach($items as $item){
            if(!empty($item['children'])){
                $template = explode('{|}',$this->templateMulti);
                $str = str_replace('{id}',$item['id'],$template[0]);
                $str = str_replace('{name}',$item['name'],$str);
                if(isset($item['published']) && $item['published'])
                    $str = str_replace('{cheked}','checked="checked"',$str);
                if(isset($item['link']))
                    $str = str_replace('{link}',$item['link'],$str);
                $this->treeHTML.= $str;
                $this->move($item['children']);
                $this->treeHTML .=$template[1];
            }else{
                $str = str_replace('{id}',$item['id'],$this->templateSingle);
                $str = str_replace('{name}',$item['name'],$str);
                if(isset($item['link']))
                    $str = str_replace('{link}',$item['link'],$str);
                if(isset($item['published']) && $item['published'])
                    $str = str_replace('{cheked}','checked="checked"',$str);
                $this->treeHTML.= $str;
            }
        }
    }


    public function generateRelations($items =  array()){

        $i=1;
        foreach($items as $item){
            $this->relations[] = [
                'id' => $item['id'],
                'parent_id' => NULL,
                'position' => $i
            ];
            $i++;
        }
         $this->buildRelations($items);
        return $this->relations;
    }

    protected function buildRelations($items =  array()){
        foreach($items as $item){


            if(isset($item['children'])){
                $i=1;
                foreach($item['children'] as $child){
                    $this->relations[] = [
                        'id' => $child['id'],
                        'parent_id' => $item['id'],
                        'position' => $i
                    ];
                    $i++;
                }
                $this->buildRelations($item['children']);
            }
        }
    }

}