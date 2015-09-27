<div class="form-group">
    <label class="col-md-2 control-label" >Name</label>
    <div class="col-md-10">
        {!! Form::text('name',@$structure['lang']['name'],['class'=>'form-control']) !!}
        {!! Form::label('name','',['class'=>'error','id'=>'name-error']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Alias</label>
    <div class="col-md-10">
        {!! Form::text('alias',@$structure['alias'],['class'=>'form-control']) !!}
        {!! Form::label('alias','',['class'=>'error','id'=>'alias-error']) !!}
    </div>

</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Parent</label>
    <div class="col-md-10">
        {!! Form::select('parent_id',$listStructures,@$structure['parent_id'],['class'=>'form-control mb-md']) !!}

    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Controller</label>
    <div class="col-md-10">
        {!! Form::select('controller',['list'=>'list','page'=>'page'],null,['class'=>'form-control mb-md']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Description</label>
    <div class="col-md-10">
        {!! Form::textarea('description',@$structure['lang']['description'],['class'=>'form-control']) !!}
        {!! Form::label('description','',['class'=>'error','id'=>'description-error']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-12">
        {!! Form::submit('Submit',['class'=>'btn btn-primary pull-right']) !!}
    </div>

</div>

{!! Form::hidden('language_id',$locale) !!}