<div class="form-group">
    <label class="col-md-2 control-label" >Name</label>
    <div class="col-md-10">
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Alias</label>
    <div class="col-md-10">
        {!! Form::text('alias',null,['class'=>'form-control']) !!}
    </div>

</div>
<div class="form-group">
    <label class="col-md-2 control-label" >Parent</label>
    <div class="col-md-10">
        <select name="parent_id" class="form-control mb-md">
            <option value="0" selected>Root</option>
            @foreach($structures as $structure)
                <option value="{{ $structure['id'] }}">{{ $structure['name'] }}</option>
            @endforeach
        </select>
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
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::submit('Submit',['class'=>'btn btn-primary pull-right']) !!}
    </div>

</div>

{!! Form::hidden('language_id',$locale) !!}