@extends('layouts.user')

@section('content')
    <div class="row justify-content-center mt-5 min-vh-100"> 
        <div class="col-6">
            <div class="row justify-content-start mt-5"> 
                <div class="col-sm-6"><h5>顧客管理</h5></div>
            </div>
            <div class="row justify-content-start mb-2 mt-lg-2"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/customer">顧客一覧</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/customer/create">顧客登録</a>
                </div>
            </div>
            <div class="row justify-content-start mt-5"> 
                <div class="col-sm-6"><h5>整備見積管理</h5></div>
            </div>
            <div class="row justify-content-start mb-2 mt-lg-2"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/quotation">見積一覧</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/quotation/create">見積登録</a>
                </div>
            </div>
            <div class="row justify-content-start mt-5"> 
                <div class="col-sm-6"><h5>マスタ管理</h5></div>
            </div>
            <div class="row justify-content-start mb-2 mt-lg-2"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/name">名称マスタ</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/boat">艇種マスタ</a>
                </div>
            </div>
            <div class="row justify-content-start mb-2 mt-3"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/base">自拠点マスタ</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/consumption_tax">自拠点マスタ</a>
                </div>
            </div>
            <div class="row justify-content-start mb-2 mt-3"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/password_change">パスワードを変更する</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row justify-content-start mt-5"> 
                <div class="col-sm-6"><h5>船舶検査管理</h5></div>
            </div>
            <div class="row justify-content-start mb-2 mt-lg-2"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/ship">船舶検査一覧</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/ship/create">船舶検査登録</a>
                </div>
            </div>
            <div class="row justify-content-start mt-5"> 
                <div class="col-sm-6"><h5>整備売上管理</h5></div>
            </div>
            <div class="row justify-content-start mb-2 mt-lg-2"> 
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/sales">売上一覧</a>
                </div>
                <div class="col-5">
                    <a class="btn btn-info btn-block" href="/sales/create">売上登録</a>
                </div>
            </div>
        </div>
    </div>
@endsection
