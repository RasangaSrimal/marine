<div class="col">
    <div class="row">
        <div class="form-group col-sm-4"><label class="mt-2">{{ $label_pref }}{{ isset($label_name) ? $label_name : '' }}</label></div>
        <div class="col-8">
            <div class="input-group">
                {{ Form::text($field_pref . '[name]', $object['name'] ?? null, ['class' => 'customer_name']) }}
            </div>
            @include('partials.field_error', ['field' => $field_pref . ".name"])
            <input type="hidden" name="{{ $field_pref }}_id" value="{{ optional($object)['id'] }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4"><label class="mt-2">{{ $label_pref }}郵便番号</label></div>
        <div class="col-4">
            <div class="input-group">
                {{ Form::text($field_pref . '[postal_code]', optional($object)['postal_code'] ?? null,) }}
            </div>
        </div>
        <div class="form-group col-sm-4 mb-2">
            <button type="button" data-zip="{{ $field_pref }}[postal_code]" data-input="{{ $field_pref }}[address1]" class="search-address btn btn-outline-secondary col align-self-end">住所入力</button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4"><label class="mt-2">{{ $label_pref }}住所1</label></div>
        <div class="col-8">
            <div class="input-group">
                {{ form::text($field_pref . '[address1]', optional($object)["address1"]) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4"><label class="mt-2">{{ $label_pref }}住所2</label></div>
        <div class="col-8">
            <div class="input-group">
                {{ form::text($field_pref . '[address2]', optional($object)["address2"]) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4"><label class="mt-2">{{ $label_pref }}TEL</label></div>
        <div class="col-8">
            <div class="input-group">
                {{ form::text($field_pref . '[tel]', optional($object)["tel"]) }}
            </div>
        </div>
    </div>
</div>
