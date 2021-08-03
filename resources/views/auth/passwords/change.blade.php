@extends('layouts.user')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="h5"><strong>パスワードを変更する</strong></div>
            <div class="col-12">
                {{Form::open(array('url' => '/password_change'))}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row mt-5">
                    <div class="col-md-3 text-md-right">
                        <label for="current_password" class="col-form-label">以前のパスワード</label>
                    </div>
                    <div class="col-md-4">
                        {{Form::password('current_password', array('id' => 'current_password', 'class' => 'form-control'))}}
                        @include('partials.field_error', ['field' => 'current_password'])
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-md-right">
                        <label for="password" class="col-form-label">新しいパスワード</label>
                    </div>
                    <div class="col-md-4">
                        {{Form::password('new_password', array('id' => 'new_password', 'class' => 'form-control'))}}
                        @include('partials.field_error', ['field' => 'new_password'])
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 text-md-right">
                        <label for="password" class="col-form-label">パスワードを認証する</label>
                    </div>
                    <div class="col-md-4">
                        {{Form::password('new_confirm_password', array('id' => 'new_confirm_password', 'class' => 'form-control'))}}
                        @include('partials.field_error', ['field' => 'new_confirm_password'])
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-7 text-right">
                        <button type="submit" class="btn btn-primary">参加する</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
