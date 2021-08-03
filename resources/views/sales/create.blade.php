@extends('sales_quotation.create')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-6"><h5><strong>整備売上伝票明細</strong></h5></div>
    </div>
    <header class="d-flex flex-column flex-md-row align-items-md-center">
        <div class="row justify-content-center mb-2 mt-lg-1"> 
            {{ Form::model($object, ["method" => 'PUT']) }}
            <div class="col">
                <div class="pt-3">
                    <div class="row ">
                        <div class="col-8">
                            <a href="/customer" class="btn btn-link pl-0">顧客一覧 <i class="fas fa-external-link-square-alt"></i></a>
                        </div>
                        <div class="form-group col-2"><label class="mt-2">ファイルNO</label></div>
                        <div class="col-2">
                            <div class="input-group">
                                {{ Form::text('file_no') }}
                            </div>
                            @include('partials.field_error', ['field' => 'file_no'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="form-group col-2"><label class="mt-2">会社名</label></div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                {{ Form::text('company_name', $object["company"]['name'] ?? null, ['id' => 'id_company']) }}
                                            </div>
                                            <input name="company_id" id="id_company_id" type="hidden">
                                            @include('partials.field_error', ['field' => 'company_name'])
                                        </div>
                                        <div class="form-group col-2"><label class="mt-2">顧客ID</label></div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                {{ Form::text('customer_id', optional(optional($object)["customer"])["id"], ['id' => 'id_customer_id', 'readonly' => 'readonly']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'customer_id'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-2"><label class="mt-2">氏名</label></div>
                                        <div class="col-4">
                                            <div class="input-group">
                                                {{ Form::text('customer_name', optional(optional($object)["customer"])['name'], ['id' => 'id_customer']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'customer_name'])
                                        </div>
                                        <div class="form-group col-sm-2"><label class="mt-2">TEL</label></div>
                                        <div class="col-4">
                                            <div class="input-group">
                                                {{ Form::text('mobile_tel', $object["customer"]["mobile_tel"] ?? null, ['id' => 'id_customer_tel', 'readonly' => 'true']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'mobile_tel'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 form-group"><label class="mt-2">ご住所</label></div>
                                        <div class="col-1 mt-2">〒</div>
                                        <div class="col-3">
                                            <div class="input-group">
                                                {{ Form::text('user_postal_code', $object["customer"]["user_postal_code"] ?? null, ['id' => 'id_customer_postal_code', 'readonly' => 'true']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'user_postal_code'])
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                {{ Form::text('user_address1', $object["customer"]["user_address1"] ?? null, ['id' => 'id_customer_address1', 'readonly' => 'true']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'user_address1'])
                                        </div>
                                        <div class="col-12 form-group">
                                            <div class="input-group">
                                                {{ Form::text('user_address2', $object["customer"]["user_address2"] ?? null, ['id' => 'id_customer_address2', 'readonly' => 'true']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'user_address2'])
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="form-group col-sm-4"><label class="mt-2">艇種</label></div>
                                        <div class="col-8">
                                            <div class="input-group">
                                                {{ Form::text('boat_type', optional(optional(optional(optional($object)["customer"])["ship"])["boatTypeMaster"])["name"]) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'boat_type'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4"><label class="mt-2">艇 No.</label></div>
                                        <div class="col-8">
                                            <div class="input-group">
                                                {{ Form::text('boat_no', optional(optional(optional($object)["customer"])["ship"])["boat_no"]) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'boat_no'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-5 pr-0"><label class="mt-2">担当サービス</label></div>
                                        <div class="col-7">
                                            <div class="input-group">
                                                {!! Form::select('service_in_charge_id', $service_in_charge) !!}
                                            </div>
                                            @include('partials.field_error', ['field' => 'service_in_charge_id'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4"><label class="mt-2">受付日</label></div>
                                        <div class="col-8">
                                            <div class="input-group date">
                                                {{ Form::text('created_date') }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'created_date'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 pr-0"><label class="mt-2">依頼内容</label></div>
                                        <div class="col-10">
                                            <div class="input-group form-group">
                                                {{ Form::textarea('request_details', null, ['class' => 'w-100 form-control ']) }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'request_details'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 pr-0 form-group"><label class="mt-2">サービス指定店</label></div>
                                        <div class="col-10">
                                            <div class="input-group">
                                                {!! Form::select('service_store_id', $service_store) !!}
                                            </div>
                                            @include('partials.field_error', ['field' => 'service_store_id'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="form-group col-sm-4"><label class="mt-2">機種</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('ship_model', optional(optional(optional($object)["customer"])["ship"])["model"]) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'ship_model'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">機番</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('machine_num', optional(optional(optional($object)["customer"])["ship"])["machine_num"]) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'machine_num'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-5 pr-0"><label class="mt-2 pr-0">担当セールス</label></div>
                                <div class="col-7">
                                    <div class="input-group">
                                        {!! Form::select('sales_in_charge_id', $sales_in_charge) !!}
                                    </div>
                                    @include('partials.field_error', ['field' => 'sales_in_charge_id'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">売上日</label></div>
                                <div class="col-8">
                                    <div class="input-group date">
                                        {{ Form::text('sales_date') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'sales_date'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">引渡日</label></div>
                                <div class="col-8">
                                    <div class="input-group date">
                                        {{ Form::text('delivery_date') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'delivery_date'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">使用時間</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('usage_time') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'usage_time'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">船名</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('ship_name', $object["ship"]["name"] ?? null, ['id' => 'id_ship']) }}
                                    </div>
                                    <input name="ship_id" id="id_ship_id" type="hidden">
                                    @include('partials.field_error', ['field' => 'ship_name'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">納入日</label></div>
                                <div class="col-8">
                                    <div class="input-group date">
                                        {{ Form::text('due_date') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'due_date'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">船検番号</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('inspection_num', $object["customer"]["ship"]["inspection_num"] ?? null, ['id' => 'id_inspection_num', 'readonly' => 'true']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'inspection_num'])
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group col-sm-4"><label class="mt-2">保管場所</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('location', optional(optional(optional($object)["customer"])["ship"])["location"]) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'location'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.records')
                <div class="mt-5 p-3">
                    <div class="row justify-content-center mb-2 mt-lg-1"> 
                        <div class="col mt-4">
                            <div class="form-group row">
                                <div class="col-sm-2"><label class="mt-2 ">工賃小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_wage_total"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"><label class="mt-2 ">部品小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_part_total"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"><label class="mt-2 ">諸経費小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_expense_total"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"><label class="mt-2 ">出張費</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input class="form-control" id="id_travel_total" type="number"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <div class="col-4"><label class="mt-2 ">合計</label></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_estimate_subtotal"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <div class="col-sm-2"><label class="mt-2">値引きその他項目</label></div>
                                <div class="input-group col-sm-2"><input class="form-control" id=""></div>
                                <div class="input-group col-sm-2"><input class="form-control" id="id_discount"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <div class="col-4"><label class="mt-2">消費税{{ $tax_rate }}％</label></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_consumption_tax"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <div class="col-4"><label class="mt-2">ご請求額</label></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_estimated_total"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mb-2 mt-lg-1 mr-0"> 
                        <a class="btn btn-link m-2 " href="/sales">キャンセル</a>
                        <button type="submit" name="action" value="update" class="btn btn-primary m-2">更新</button>
                        <button type="submit" class="btn btn-secondary  mt-2 mb-2 ml-2">売上伝票新規作成</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
    </header>
@endsection
