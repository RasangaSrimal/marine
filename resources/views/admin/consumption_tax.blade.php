@extends('layouts.user')

@section('content')
    <div class="row justify-content-start mb-2 mt-lg-2"> 
        <div class="col-sm-6"><h5><strong>消費税マスタ</strong></h5></div>
    </div>
    <div class="row justify-content-center mb-2 mt-4"> 
        <div class="col">
            {{ Form::open(['method' => 'POST']) }}
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2">
                    <label class="mt-0">現消費税</label>
                </div>
                <div class="col-6">
                    <div class="form-inline">
                        <div class="input-group col-lg-3 pl-0">
                            <input class="form-control" name="current_rate" value="{{ $currentRate['tax_rate'] }}" type="number">
                        </div>
                        <label class="form-label mt-2" for="autoSizingCheck2"> % </label>
                    </div>
                    @include('partials.field_error', ['field' => 'current_rate'])
                </div>
                <div class="col-6"></div>
            </div>
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2">
                    <label class="mt-0">新消費税</label>
                </div>
                <div class="col-6">
                    <div class="form-inline">
                        <div class="input-group col-lg-3 pl-0">
                            <input class="form-control" name="tax_rate" value="{{ $futureRate['tax_rate'] }}" type="number">
                        </div>
                        <label class="form-label mt-2" for="autoSizingCheck2"> % </label>
                    </div>
                    @include('partials.field_error', ['field' => 'tax_rate'])
                </div>
                <div class="col-6"></div>
            </div>
            <div class="position-relative form-group row">
                <div class="form-group col-sm-2">
                    <label class="mt-0">消費税改正日</label>
                </div>
                <div class="col-6">
                    <div class='input-group mb-3 datetimepicker' id='datetimepicker'>
                        <input class="form-control" name="date" value="{{ optional($futureRate)['date'] }}" />
                    </div>
                    @include('partials.field_error', ['field' => 'date'])
                </div>
                <div class="col-6"></div>
            </div>
            <button type="submit" class="btn btn-secondary">更新</button>
            {{ Form::close() }}
        </div>
    </div>



    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

@endsection
