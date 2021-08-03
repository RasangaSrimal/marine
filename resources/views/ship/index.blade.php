@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-2 mt-2">船舶検査一覧</div>
        <div class="col-sm-1 mr-3">
            <a class="btn btn-info" href="/ship/create">新規作成</a>
        </div>
    </div>
    <div class="row justify-content-center mb-2 mt-lg-1"> 
        {{ Form::open(['method'=>'GET', 'url'=>'/ship', 'role'=>'search']) }}
        <div class="row">
            <div class="col-11 form-inline">
            @include('partials.field', ['field_ja' => "船籍番号", 'field' => "id"])
            @include('partials.field', ['field_ja' => "会社名", 'field' => "customer_company"])
            @include('partials.field', ['field_ja' => "所有者", 'field' => "customer_name"])
            @include('partials.field', ['field_ja' => "船名", 'field' => "name"])
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
                                <th>証書番号</th>
                                <th>船舶検査番号 </th>
                                <th>船名</th>
                                <th>所有者名</th>
                                <th>船舶借入人名</th>
                                <th>交付日</th>
                                <th>用途</th>
                                <th>航行区域</th>
                                <th>船籍番号</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ship as $key => $data)
                                <tr>
                                    <th><a class="btn btn-outline-secondary" href="/ship/{{ $data->id }}/edit">詳細</a></th>
                                    <th>{{ $data->certificate_num }}</th>
                                    <th>{{ $data->inspection_num }}</th>
                                    <th>{{ $data->name }}</th>
                                    <th>{{ $data->owner['name'] }}</th>
                                    <th>{{ $data->borrower['name'] }}</th>
                                    <th>{{ $data->delivery_date }}</th>
                                    <th>{{ optional(optional($data)['use'])['usage_name'] }}</th>
                                    <th>{{ optional(optional($data)['navigationArea'])['area_name'] }}</th>
                                    <th>{{ $data->id }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
