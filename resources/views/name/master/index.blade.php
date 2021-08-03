@extends('admin.name')

@section('table')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>カテゴリ</th>
                                @foreach($fields as $field => $jname)
                                <th>{{ __('validation.attributes.' . $field) }}</th>
                                @endforeach
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objects as $obj)
                                <tr>
                                    <th>{{ $title }}</th>
                                    @foreach($fields as $field => $jname)
                                        <th>{{ $obj[$db_fields[$field] ?? $field] }}</th>
                                    @endforeach
                                    <th><a href="{{ $route === 'boat' ? "" : "/name" }}/{{ $route }}/{{ $obj->id }}/edit" class="btn btn-outline-secondary">詳細</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
