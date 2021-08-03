<div class="form-group col-sm-1"><label class="mt-2">検査日</label></div>
<div class="col-2">
    <div class="input-group date">
        {{ Form::text($field) }}
    </div>
    @include('partials.field_error', ['field' => $field])
</div>
<div class="form-group col-sm-1"><label class="mt-2">検査種類 </label></div>
<div class="form-group col-sm-2 mb-2">
    <select name="{{ $select }}">
        <option>中間検査</option>
        <option>定期検査</option>
        <option>臨時検査</option>
        <option>書換</option>
        <option>再発行</option>
    </select>
</div>
