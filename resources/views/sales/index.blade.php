@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-2">整備売上伝票一覧</div>
        <div class="col-sm-1 mr-3">
            <a class="btn btn-info" href="/sales/create">新規作成</a>
        </div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        {{ Form::open(['method'=>'GET', 'url'=>'/sales', 'role'=>'search']) }}
        <div class="row">
            <div class="col-11 form-inline">
                @include('partials.field', ['field_ja' => "ID", 'field' => "id"])
                @include('partials.field', ['field_ja' => "顧客", 'field' => "customer_name"])
                @include('partials.field', ['field_ja' => "艇種", 'field' => "boat_type_name"])
                @include('partials.field', ['field_ja' => "船名", 'field' => "ship_name"])
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-outline-secondary">検索</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>詳細</th>
                                <th>ID</th>
                                <th>顧客氏名 </th>
                                <th>会社名</th>
                                <th>艇種</th>
                                <th>船名</th>
                                <th>依頼内容</th>
                                <th>請求金額</th>
                                <th>作成日</th>
                                <th>印刷</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $key => $data)
                                <tr>
                                    <th><a class="btn btn-outline-secondary" href="/sales/{{ $data->id }}/edit">詳細</button></th>
                                    <th>{{ $data->id }}</th>
                                    <th>{{ optional(optional($data)["customer"])['name'] }}</th>
                                    <th>{{ optional(optional($data)["company"])['name'] }}</th>
                                    <th>{{ optional(optional(optional($data)["ship"])['boatTypeMaster'])['name'] }}</th>
                                    <th>{{ optional(optional($data)["ship"])['name'] }}</th>
                                    <th>{{ $data->request_details }}</th>
                                    <th>{{ $data->request_amount }}</th>
                                    <th>{{ $data->created_date }}</th>
                                    <th><a class="btn btn-outline-secondary" href="/sales/{{ $data->id }}">印刷</button></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
