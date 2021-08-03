<div class="form-group col-sm-1">
    <label>{{ $field_ja ?? null }}</label>
</div>
<div class="col-2">
    <div class="input-group">
        {{ Form::text($field, null, [
            'class' => "form-control " . ( $errors->has($field) ? 'is-invalid' : '' ) . " col-md-12",
        ]) }}
    </div>
    @include('partials.field_error', ['field' => $field])
</div>
