@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-2">名称マスタ一</div>
        <div class="col-sm-2">
            <button class="btn btn-outline-secondary" type="button"  id="id_create">新規作成</button>
        </div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1 @if(Request::route()->getName() === "boat.index") d-none @endif"> 
        <form class="col">
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2"><label class="mt-2">カテゴリ</label></div>
                <div class="form-group col-sm-4 mb-2">
                    <select class="form-control" id="id_select_table">
                        <option value="sales_company_classification"> 販売会社区分</option>
                        <option value="sales_in_charge">担当セールス</option>
                        <option value="service_in_charge">担当サービス</option>
                        <option value="service_store">外注サービス店</option>
                        <option value="engine_model_list">エンジン機種リスト</option>
                        <option value="storage_marina">保管マリーナ</option>
                        <option value="type_classification">種別区分</option>
                        <option value="sales_category">売上区分</option>
                        <option value="expense_detail">諸経費明細語句</option>
                        <option value="estimate_delivery_date">見積納期事例</option>
                        <option value="estimate_payment_terms">見積支払条件</option>
                        <option value="estimated_delivery_place">見積受渡場所事例</option>
                        <option value="job_title">役職名</option>
                        <option value="limited_coastal_area">限定沿海区域</option>
                        <option value="navigation_area">航行区域</option>
                        <option value="ship_type">船種</option>
                        <option value="use_ship">用途</option>
                        <option value="ship_special_name">船舶特殊名義</option>
                    </select>
                </div>
                <button type="button" class="btn btn-outline-secondary col-2 align-self-end mb-3 ml-2" id="id_search">検索</button>
            </div>
        </form>
    </div>
    @yield('table')
@endsection


@section('scripts')
    <script>
        $(function (){
            $("#id_search").click(function(){
                window.location = "/name/" + $('#id_select_table').val();
            });
            $("#id_create").click(function(){
                @if(Request::route()->getName() === "boat.index") 
                    window.location = "/boat/create";
                @else
                    window.location = "/name/" + $('#id_select_table').val() ?? + "/create";
                @endif
            });
            @if($route ?? false)
                $("#id_select_table").val('{{ $route }}');
            @endif
        })
    </script>
@endsection
