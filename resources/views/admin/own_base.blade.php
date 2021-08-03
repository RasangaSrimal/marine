@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-6"><h5><strong>自拠点マスタ</strong></h5></div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        {{ Form::model($base, ["method" => 'PUT']) }}
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">店コード</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('store_code') }}
                </div>
                @include('partials.field_error', ['field' => 'store_code'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">店名1</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('store_name1') }}
                </div>
                @include('partials.field_error', ['field' => 'store_name1'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">店名2</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('store_name2') }}
                </div>
                @include('partials.field_error', ['field' => 'store_name2'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">〒</label></div>
            <div class="col-4">
                <div class="input-group">
                    {{ Form::text('postal_code') }}
                </div>
                @include('partials.field_error', ['field' => 'postal_code'])
            </div>
            <div class="col-4">
                <button type="button" data-zip="postal_code" data-input="address" class="search-address btn btn-outline-secondary col align-self-end">住所入力</button>
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">住所1</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('address') }}
                </div>
                @include('partials.field_error', ['field' => 'address'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">TEL</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('tel') }}
                </div>
                @include('partials.field_error', ['field' => 'tel'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">FAX</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('fax') }}
                </div>
                @include('partials.field_error', ['field' => 'fax'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">銀行名</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('bank_name') }}
                </div>
                @include('partials.field_error', ['field' => 'bank_name'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-4"><label class="mt-2">口座名</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('account_name') }}
                </div>
                @include('partials.field_error', ['field' => 'account_name'])
            </div>
        </div>
        <div class="position-relative form-group row">
            <div class="form-group col-sm-4"><label class="mt-2">口座番号</label></div>
            <div class="col-8">
                <div class="input-group">
                    {{ Form::text('account_number') }}
                </div>
                @include('partials.field_error', ['field' => 'account_number'])
            </div>
        </div>
        <div class="row justify-content-end mb-2 mt-lg-1 mr-0"> 
            <button type="submit" name="action" value="update" class="btn btn-primary m-2">セーブ</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection
