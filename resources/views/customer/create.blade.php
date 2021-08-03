@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-1">顧客明細</div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        {{ Form::model($customer, ["method" => 'PUT']) }}
        <div class="row">
            <div class="form-group col-sm-2"><label class="mt-2">ユーザコード</label></div>
            <div class="col-4">
                <div class="input-group">
                    {{ Form::text('user_code') }}
                </div>
                @include('partials.field_error', ['field' => 'user_code'])
            </div>
            <div class="form-group col-sm-2"><label class="mt-2">担当セールス</label></div>
            <div class="col-4">
                <div class="input-group">
                    {!! Form::select('sales_in_charge_id', $salesInCharge) !!}
                </div>
                @include('partials.field_error', ['field' => 'sales_in_charge_id'])
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-2"><label class="mt-2">フリガナ</label></div>
            <div class="col-4">
                <div class="input-group">
                    {{ Form::text('kana') }}
                </div>
                @include('partials.field_error', ['field' => 'kana'])
            </div>
            <div class="form-group col-sm-2"><label class="mt-2">役職名</label></div>
            <div class="col-4">
                <div class="input-group">
                    {!! Form::select('job_title_id', $roleNames) !!}
                </div>
                @include('partials.field_error', ['field' => 'role_name'])
            </div>
        </div>
        <div class="row">
            @include('partials.customer', ['label_name' => "氏名", 'label_pref' => "", 'field_pref' => "customer", 'object' => $customer])
            @include('partials.customer', ['label_name' => "会社名", 'label_pref' => "", 'field_pref' => "company", 'object' => $customer->company])
        </div>
        <div class="row">
            <div class="form-group col-sm-2"><label class="mt-2">自宅TEL</label></div>
            <div class="col-4">
                <div class="input-group">
                    {{ Form::text('home_tel') }}
                </div>
                @include('partials.field_error', ['field' => 'home_tel'])
            </div>
            <div name="dm_issuance_cla" class="form-group col-sm-2"><label class="mt-2">DM発行区分</label></div>
            <div class="form-group col-sm-4 mb-2">
                <select class="form-control" name="dm_issuance_cla">
                    <option>自宅</option>
                    <option>会社</option>
                    <option>発送無し</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-2"><label class="mt-2">ユーザID</label></div>
            <div class="col-4">
                <div class="input-group">
                    {{ Form::text('id', null, ['class' => 'form-control ', 'readonly' => 'true']) }}
                </div>
                @include('partials.field_error', ['field' => 'id'])
            </div>
            <div class="form-group col-sm-2"><label class="mt-2">登録日時</label></div>
            <div class="col-4">
                <div class="input-group date">{{ Form::text('registered_date') }}</div>
                @include('partials.field_error', ['field' => 'registered_date'])
            </div>
        </div>
        <div class="row justify-content-end mb-2 mt-lg-1 mr-0"> 
            <a class="btn btn-link m-2 " href="/customer">キャンセル</a>
            <button type="submit" name="action" value="update" class="btn btn-primary m-2">更新</button>
            <a class="btn btn-secondary mb-2 mt-2" href="/sales/create?customer_id={{ $customer['id'] }}">売上伝票新規作成</a>
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('scripts')
    <script>
        $(function (){
            customerAutoComplete('company', @json($companies), {{ isset($customer['company_id']) }});
        });
    </script>
@endsection


