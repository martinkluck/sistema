<div class="form-group">
    {{Form::label('name','Nombre')}}
    {{Form::text('name',null,['class'=>'form-control', 'id'=>'name'])}}
</div>
<div class="form-group">
    {{Form::label('description','Descripción')}}
    {{Form::text('description',null,['class'=>'form-control', 'id'=>'description'])}}
</div>
<div class="form-group">
    {{ Form::label('category_id','Categorías') }}
    {{ Form::select('category_id',$categories,null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('price','Precio')}}
    {{Form::text('price',null,['class'=>'form-control', 'id'=>'price'])}}
</div>
<div class="form-group">
    {{Form::label('stock','Stock')}}
    {{Form::number('stock',null,['class'=>'form-control', 'id'=>'stock'])}}
</div>
<div class="form-group">
    {{Form::label('imei','IMEI')}}
    {{Form::number('imei',null,['class'=>'form-control', 'id'=>'imei'])}}
</div>
<div class="form-group">
    {{Form::label('code','Código')}}
    {{Form::number('code',null,['class'=>'form-control', 'id'=>'code'])}}
</div>
<div class="form-group">
    {{Form::label('images','Imagenes')}}
    {{Form::file('images[]', array('class'=>'form-control','multiple' => true, 'id'=>'images')) }}
</div>
<div class="form-check form-check-inline">
    {{Form::checkbox('status',1,null, ['class'=>'form-check-input', 'id'=>'status'])}}
    {{Form::label('status','Activo', ['class'=>'form-check-label'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
    <a href="{{route('products.index')}}" class="btn btn-default">Cancelar</a>
</div>
