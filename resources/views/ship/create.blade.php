@extends('layouts.user')

@section('content')
    {{ Form::model($ship, ["method" => 'PUT']) }}
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-6"><h5><strong>船舶検査明細</strong></h5></div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        <div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">船種</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {!! Form::select('ship_type_id', $shipTypes) !!}
                    </div>
                    @include('partials.field_error', ['field' => 'ship_type_id'])
                </div>
                <div class="form-group col-sm-2"><label class="mt-2">船名</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ Form::text('name') }}
                    </div>
                    @include('partials.field_error', ['field' => 'name'])
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">船舶検査番号</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ Form::text('inspection_num') }}
                    </div>
                    @include('partials.field_error', ['field' => 'inspection_num'])
                </div>
                <div class="form-group col-sm-2"><label class="mt-2">船籍港</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ Form::text('registration_port') }}
                    </div>
                    @include('partials.field_error', ['field' => 'registration_port'])
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">総トン数</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ Form::text('gross_register_tonn') }}
                    </div>
                    @include('partials.field_error', ['field' => 'gross_register_tonn'])
                </div>
                <div class="form-group col-sm-2"><label class="mt-2">船舶の長さ</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ Form::text('length') }}
                    </div>
                    @include('partials.field_error', ['field' => 'length'])
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">用途</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {!! Form::select('use_id', $usageNames) !!}
                    </div>
                    @include('partials.field_error', ['field' => 'use_id'])
                </div>
                <div class="form-group col-sm-2"><label class="mt-2">航行区域</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {!! Form::select('navigation_area_id', $areaNames) !!}
                    </div>
                    @include('partials.field_error', ['field' => 'navigation_area_id'])
                </div>
            </div>
            <div class="row">
                @include('partials.customer', ['label_pref' => "所有者", 'field_pref' => "owner", 'object' => $ship->owner])
                @include('partials.customer', ['label_pref' => "借入人", 'field_pref' => "borrower", 'object' => $ship->borrower])
            </div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">船舶検査ID</label></div>
                <div class="col-4">
                    <div class="input-group">
                        {{ form::text('inspection_id') }}
                    </div>
                    @include('partials.field_error', ['field' => 'inspection_id'])
                </div>
                <div class="form-group col-sm-2"><label class="mt-2">登録日時</label></div>
                <div class="col-4">
                    <div class="input-group date">
                        {{ form::text('registered_date') }}
                    </div>
                    @include('partials.field_error', ['field' => 'registered_date'])
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="form-group col-6 mb-2"><label class="mt-2">最大搭載人員</label></div>
                                <div class="form-group col-sm-2"><label class="mt-2">旅客</label></div>
                                <div class="col-4 pr-0 ml-0">
                                    <div class="input-group">
                                        {{ Form::text('passengers_max_num', null, ['id' => 'id_passengers']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'passengers_max_num'])
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="form-group col-6"><label class="mt-2">船員</label></div>
                                <div class="col-6">
                                    <div class="input-group">
                                        {{ Form::text('sailors_max_num', null, ['id' => 'id_sailors']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'sailors_max_num'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="form-group col-8"><label class="mt-2">その他の乗船者</label></div>
                                <div class="col-4">
                                    <div class="input-group">
                                        {{ Form::text('other_passengers_max_num', null, ['id' => 'id_other']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'other_passengers_max_num'])
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="form-group col-6"><label class="mt-2">計</label></div>
                                <div class="col-6">
                                    <div class="input-group">
                                        {{ Form::text('total_passengers_num', null, ['id' => 'id_total']) }}
                                    </div>
                                    @include('partials.field_error', ['field' => 'total_passengers_num'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">その他の航行上の条件</label>
                <div class="col-sm-10">
                    {{ Form::textarea('other_navigational_conditions', null, ['rows' => '4', 'class' => 'form-control' . ($errors->has('other_navigational_conditions') ? 'is-invalid' : '')]) }}
                    @include('partials.field_error', ['field' => "other_navigational_conditions"])
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2"><label class="mt-2">交付日</label></div>
                <div class="col-4">
                    <div class="input-group date">
                        {{ Form::text('delivery_date') }}
                    </div>
                    @include('partials.field_error', ['field' => 'delivery_date'])
                </div>
                @include('partials.field_select', ['field' => "inspection_date1", 'select' => "inspection_type1"])
            </div>
            <div class="row">
                @include('partials.field_select', ['field' => "inspection_date2", 'select' => "inspection_type2"])
                @include('partials.field_select', ['field' => "inspection_date3", 'select' => "inspection_type3"])
            </div>
            <div class="row">
                @include('partials.field_select', ['field' => "inspection_date4", 'select' => "inspection_type4"])
                @include('partials.field_select', ['field' => "inspection_date5", 'select' => "inspection_type5"])
            </div>
        </div>
    </div>
    <div class="row justify-content-end mb-2 mt-lg-1 mr-0"> 
        <a class="btn btn-link m-2 " href="/ship">キャンセル</a>
        <button type="submit" name="action" value="update" class="btn btn-primary m-2">更新</button>
        <a class="btn btn-secondary mb-2 mt-2" href="/sales/create">売上伝票新規作成</a>
    </div>
    {{ Form::close() }}
@endsection

@section('scripts')
    <script>
        $(function (){
            customerAutoComplete('owner', @json($customers), {{ isset($ship->owner['id']) }});
            customerAutoComplete('borrower', @json($customers), {{ isset($ship->borrower['id']) }});
            $('.input-group input').addClass('form-control');
            function calc_total() {
                var rowTotal = parseInt($("#id_passengers") .val() || 0) + parseInt($("#id_sailors").val() || 0) + parseInt($("#id_other").val() || 0);
                $("#id_total").val(rowTotal);
            }
            $("input").change(calc_total);
            calc_total();
        });
    </script>
@endsection
