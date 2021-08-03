@extends('layouts.user')

@section('content')
    {{ Form::model($obj, ["method" => ($obj->id ? 'PUT' : 'POST'), "route" => [
        $route . '.' . ($obj->id ? 'update' : 'store'), 
        $obj->id,
    ]]) }}
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-2"><h5><strong>{{ $title }}</strong></h5></div>
    </div>
    <div class="row justify-content-center mb-2 mt-4"> 
        <div class="col">
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2 mb-2">
                    <input readonly class="form-control-plaintext" value="カテゴリ">
                </div>
                <div class="form-group col-sm-4 mb-2">
                    <select class="form-control">
                        <option>{{ $title }}</option>
                    </select>
                </div>
            </div>
            @foreach($fields as $field => $jname)
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2"><label class="mt-2">{{ __('validation.attributes.' . $field) }}</label></div>
                <div class="input-group col-sm-4">
                    {{ Form::text($field, $obj[$db_fields[$field] ?? $field], ['class' => 'form-control ' . ($errors->has($field) ? 'is-invalid' : '')]) }}
                    @include('partials.field_error', ['field' => $field])
                 </div>
            </div>
            @endforeach
            <a class="btn btn-outline-secondary mb-2" href="/name/{{ $route }}">キャンセル</a>
            <button type="submit" name="action" value="update" class="btn btn-outline-secondary mb-2">{{ $obj->id ? '更新' : '保存' }}</button>
            @if($obj->id)
                <button type="button" id="id_delete_btn" name="action" value="destroy" class="btn btn-outline-secondary mb-2">削除</button>
            @endif
        </div>
    </div>
    {{ Form::close() }}
    @if($obj->id)
        {{ Form::model($obj, ["method" => 'DELETE', "id" => 'id_delete_form', "route" => [$route . '.destroy', $obj->id]]) }}
        {{ Form::close() }}
    @endif
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#id_delete_btn').click(function () {
                $('#id_delete_form').submit();
            });
        });
    </script>
@endsection
