@extends('pdf_view')

@section('content')
    <h2 class="center">御 請 求 書 明 細 書</h2>
    <hr>
    <table class="border_none w100">
        <tr>
            <td class="w50">
                <div>
                    <div>
                        〒 {{ optional($sales['customer'])['postal_code'] }} <br>
                        {{ optional($sales['customer'])['address1'] }} <br>
                        <h3 class="right">
                            {{ optional($sales['customer'])['name'] }} 殿 
                        </h3>
                    </div>
                    <hr>
                </div>
                <table class="border_none">
                    <tr>
                        <td>
                            <p>
                                下記の通り御請求申し上げます 。 
                                　　　　　　　　　　　　　　　　　　　　　　　　　
                                　　　　　　　　　　　　　　　　　　　　　　
                            </p> 
                            <br>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="underline-table">
                    <tr>
                        <td><h3>ご請求総金額</h3></td>
                        <td class="right"><h3>{{ $sales->withTax() }}</h3></td>
                    </tr>
                    <tr>
                        <td>受付日</td>
                        <td class="right">{{ $sales->due_date }}</td>
                    </tr>
                    <tr>
                        <td>完了引遂日</td>
                        <td class="right">{{ $sales->delivery_date }}</td>
                    </tr>
                    <tr>
                        <td>依頼内容</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $sales->request_details }}</td>
                        <td></td>
                    </tr>
                </table>

            </td>
            @include('partials.pdf_header', ['object' => $sales, 'is_sales' => true])
        </tr>
    </table>
    @include('partials.pdf_body', ['object' => $sales, 'is_sales' => true])
    <div class="text-left">
        恐れ入りますがお支払は現企又は仮込みでお願いしま  
        <span style="color:red">お支払い先  {{ $base['bank_name'] }}  当座  {{ $base['account_number'] }}</span>
    </div> 
@endsection

