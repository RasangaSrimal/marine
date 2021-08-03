@extends('sales_quotation.create')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-6"><h5><strong>整備見積明細</strong></h5></div>
    </div>
    <header class="d-flex flex-column flex-md-row align-items-md-center">
        <div class="row justify-content-center mb-2 mt-lg-1"> 
            {{ Form::model($object, ["method" => 'PUT']) }}
            <div class="col">
                <div class="pt-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="form-group col-2"><label class="mt-2 pr-0">顧客ID</label></div>
                                <div class="col-4">
                                    <div class="input-group">
                                        {{ Form::text('customer_id', $object["customer_id"] ?? null, ['id' => 'id_customer_id', 'readonly' => 'true']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'customer_id'])
                                </div>
                                <div class="form-group col-2 pr-0"><label class="mt-2 pr-0">ﾕｰｻﾞｰｺｰﾄﾞ</label></div>
                                <div class="col-4">
                                    <div class="input-group">
                                        {{ Form::text('user_code') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'user_code'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2"><label class="mt-2">会社名</label></div>
                                <div class="col-10">
                                    <div class="input-group">
                                        {{ Form::text('company_name', $object["company"]['name'] ?? null, ['id' => 'id_company']) }}
                                    </div>
                                    <input name="company_id" id="id_company_id" type="hidden">
                                    @include('partials.field_error', ['field' => 'company_name'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-2"><label class="mt-2 mr-0 pr-0">顧客氏名</label></div>
                                <div class="col-10">
                                    <div class="input-group">
                                        {{ Form::text('customer_name', $object->customer['name'] ?? null, ['id' => 'id_customer']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'customer_name'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 ">
                                    <h6>下記の通り御見積申し上げます。
                                        最新の技術と豊面な経験により確実な整備をお届ます。
                                        何とそ御用命眼りますようお願い申し上げ
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">御見積総金額</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('estimated_amount') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'estimated_amount'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">件 名</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {{ Form::text('estimated_subject') }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'estimated_subject'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">納期</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {!! Form::select('delivery_date_id', $deliveryDates) !!}
                                    </div>
                                    @include('partials.field_error', ['field' => 'delivery_date_id'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">受渡場所</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {!! Form::select('delivery_place_id', $deliveryPlaces) !!}
                                    </div>
                                    @include('partials.field_error', ['field' => 'delivery_place_id'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">見積有効期限</label></div>
                                <div class="col-8">
                                            <div class="input-group date">
                                        {{ Form::text('expiration_date', $object->expiration_date) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'expiration_date'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4"><label class="mt-2">御支払条件</label></div>
                                <div class="col-8">
                                    <div class="input-group">
                                        {!! Form::select('payment_terms_id', $paymentTerms) !!}
                                    </div>
                                    @include('partials.field_error', ['field' => 'payment_terms_id'])
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="form-group col-4"><label class="mt-2">見積No.</label></div>
                                        <div class="col-8">
                                            <div class="input-group">
                                                {{ Form::text('estimate_num') }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'estimate_num'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-4"><label class="mt-2">見積 年月日</label></div>
                                        <div class="col-8">
                                            <div class="input-group date">
                                                {{ Form::text('estimate_date') }}
                                            </div>
                                            @include('partials.field_error', ['field' => 'estimate_date'])
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-11">
                                        <div class="form-group row">
                                            <div class="col-12 pt-5 mb-2">
                                                <h6>〒572-0077 大阪府寝屋川市点野2-20-1<br>
                                                    マリン大阪 株式会社
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3"><label class="mt-2">船名</label></div>
                                            <div class="col-9 pl-0 ml-0">
                                                <div class="input-group">
                                                    {{ Form::text('ship_name', $object["ship"]["name"] ?? null, ['id' => 'id_ship']) }}
                                                </div>
                                                <input name="ship_id" id="id_ship_id" type="hidden">
                                                @include('partials.field_error', ['field' => 'ship_name'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="form-group col-6"><label class="mt-2">艇種</label></div>
                                                    <div class="col-6 pl-0 ml-0">
                                                        <div class="input-group">
                                                            {{ Form::text('boat_type', optional(optional(optional($object)["ship"])['boatTypeMaster'])['name']) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'boat_type'])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6 pr-0 mr-0"><label class="mt-2">エンジン機種</label></div>
                                                    <div class="col-6 pl-0 ml-0">
                                                        <div class="input-group">
                                                            {{ Form::text('model', optional(optional($object)["ship"])["model"]) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'model'])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6 pr-0 mr-0"><label class="mt-2">船舶検査番号</label></div>
                                                    <div class="col-6 pl-0 ml-0">
                                                        <div class="input-group">
                                                            {{ Form::text('inspection_num', $object["ship"]["inspection_num"] ?? null, ['id' => 'id_inspection_num', 'readonly' => 'true']) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'inspection_num'])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6 pr-0 mr-0"><label class="mt-2">船舶検査日</label></div>
                                                    <div class="col-6 pl-0 ml-0">
                                                        <div class="input-group date">
                                                            {{ Form::text('inspection_date', $object["ship"]["inspection_date"] ?? null) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'inspection_date'])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="form-group col-4"><label class="mt-2">艇番</label></div>
                                                    <div class="col-8">
                                                        <div class="input-group">
                                                            {{ Form::text('hull_num') }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'hull_num'])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-4"><label class="mt-2">機番 R</label></div>
                                                    <div class="col-8">
                                                        <div class="input-group">
                                                            {{ Form::text('engine_num_r', optional(optional($object)["ship"])["engine_num_r"]) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'engine_num_r'])
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-4"><label class="mt-2">機番 L</label></div>
                                                    <div class="col-8">
                                                        <div class="input-group">
                                                            {{ Form::text('engine_num_l', optional(optional($object)["ship"])["engine_num_l"]) }}
                                                        </div>
                                                        @include('partials.field_error', ['field' => 'engine_num_l'])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-3"><label class="mt-2">保管場所</label></div>
                                            <div class="col-9 pl-0 ml-0">
                                                <div class="input-group">
                                                    {{ Form::text('location', optional(optional($object)["ship"])["location"]) }}
                                                </div>
                                                @include('partials.field_error', ['field' => 'location'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
                @include('partials.records')
                <div class="mt-3 p-3">
                    <div class="row justify-content-center mb-2 mt-lg-1"> 
                        <div class="col mt-4">
                            <div class="row">
                                <div class="form-group col-sm-2"><label class="mt-2">工賃小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_wage_total"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2"><label class="mt-2">部品小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_part_total"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-2"><label class="mt-2">諸経費小計</label></div>
                                <div class="col-8"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_expense_total"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="form-group col-sm-2"><label class="mt-2">値引きその他項目</label></div>
                                <div class="input-group col-sm-2"><input class="form-control"></div>
                                <div class="input-group col-sm-2"><input name="discount" class="form-control" id="id_discount"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="form-group col-sm-2"><label class="mt-2">見積小計</label></div>
                                <div class="col-2"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_estimate_subtotal"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="form-group col-sm-2"><label class="mt-2">消費税{{ $tax_rate }}％</label></div>
                                <div class="col-2"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_consumption_tax"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"></div>
                                <div class="form-group col-sm-2"><label class="mt-2">見積合計</label></div>
                                <div class="col-2"></div>
                                <div class="input-group col-sm-2"><input readonly class="form-control" id="id_estimated_total"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mb-2 mt-l mr-2"> 
                    <a class="btn btn-link m-2 " href="/quotation">キャンセル</a>
                    <button type="submit" name="action" value="update" class="btn btn-primary m-2">更新</button>
                    <a class="btn btn-secondary mb-2 mt-2" href="/sales/create">売上伝票新規作成</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </header>
@endsection
