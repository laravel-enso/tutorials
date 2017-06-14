<div class="col-sm-6">
    <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : '' }}">
        {!! Form::label('permission_id', __('Permission')) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('permission_id') }}
        </small>
        {!! Form::select('permission_id', $permissions, null, ['class' => 'form-control select']) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group{{ $errors->has('element') ? ' has-error' : '' }}">
        {!! Form::label('element', __("Element")) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('element') }}
        </small>
        {!! Form::text('element', null, ['class' => 'form-control', 'placeholder' => __("Fill")]) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title', __("Title")) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('title') }}
        </small>
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => __("Fill")]) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group{{ $errors->has('placement') ? ' has-error' : '' }}">
        {!! Form::label('placement', __("Placement")) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('placement') }}
        </small>
        {!! Form::select('placement', $positions, null, ['class' => 'form-control select']) !!}
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        {!! Form::label('order', __("Order")) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('order') }}
        </small>
        {!! Form::text('order', null, ['class' => 'form-control', 'placeholder' => __("Fill")]) !!}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        {!! Form::label('content', __("Content")) !!}
        <small class="text-danger" style="float:right;">
            {{ $errors->first('content') }}
        </small>
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => __("Fill")]) !!}
    </div>
</div>