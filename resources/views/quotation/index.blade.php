@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-2">整備見積一覧</div>
        <div class="col-sm-1 mr-3">
            <a class="btn btn-info" href="/quotation/create">新規作成</a>
        </div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        {{ Form::open(['method'=>'GET', 'url'=>'/quotation', 'role'=>'search']) }}
        <div class="row">
            <div class="col-11 form-inline">
                @include('partials.field', ['field_ja' => "船籍番", 'field' => "id"])
                @include('partials.field', ['field_ja' => "船名", 'field' => "ship_name"])
                @include('partials.field', ['field_ja' => "艇種", 'field' => "boat_type_name"])
                @include('partials.field', ['field_ja' => "顧客", 'field' => "name"])
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
                                <th>No</th>
                                <th>顧客氏名</th>
                                <th>会社名</th>
                                <th>艇種</th>
                                <th>船名</th>
                                <th>見積金額</th>
                                <th>見積件名</th>
                                <th>作成日</th>
                                <th>印刷</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quotation as $key => $data)
                                <tr>
                                    <th><a class="btn btn-outline-secondary" href="/quotation/{{ $data->id }}/edit">詳細</a></th>
                                    <th>{{ $data->id }}</th>
                                    <th>{{ optional($data["customer"])['name'] }}</th>
                                    <th>{{ optional($data['company'])['name'] }}</th>
                                    <th>{{ optional(optional($data["ship"])['boatTypeMaster'])['name'] }}</th>
                                    <th>{{ optional($data["ship"])['name'] }}</th>
                                    <th>{{ $data->estimated_amount }}</th>
                                    <th>{{ $data->estimated_subject }}</th>
                                    <th>{{ $data->created_date }}</th>
                                    <th><a class="btn btn-outline-secondary" href="/quotation/{{ $data->id }}">詳細</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
