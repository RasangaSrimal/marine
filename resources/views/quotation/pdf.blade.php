@extends('pdf_view')

@section('content')
    <h2 class="center">御　見　積　書</h2>
    <hr>
    <table class="border_none">
        <tr>
            <td class="w50">
                <div>
                    <div>
                        {{ $quotation['company']['name'] }} <br>
                        <h3 class="right">
                            {{ $quotation['customer']['name'] }} 殿 
                        </h3>
                    </div>
                    <hr>
                </div>
                <table class="border_none">
                    <tr>
                        <td>
                            <p>
                                下記の通り御見積申し上げます。
                                最新の技術と豊面な経験により確実な整備をお届ます。
                                何とそ御用命眼りますようお願い申し上げます。
                            </p>
                        </td>
                    </tr>
                </table>
                <table class="underline-table">
                    <tr>
                        <td>
                            <h3>御見積総金額</h3>
                        </td>
                        <td class="right"><h3>{{ $quotation->withTax() }}</h3></td>
                    </tr>
                    <tr>
                        <td>件　　名</td>
                        <td class="right">{{ $quotation->estimated_subject }}</td>
                    </tr>
                    <tr>
                        <td>納　　期</td>
                        <td class="right">{{ $quotation->delivery_date }}</td>
                    </tr>
                    <tr>
                        <td>受渡場所</td>
                        <td class="right">{{ $quotation->deliveryPlace->delivery_place }}</td>
                    </tr>
                    <tr>
                        <td>見積有効期限</td>
                        <td class="right">{{ $quotation->expiration_date }}</td>
                    </tr>
                    <tr>
                        <td>支払案件</td>
                        <td class="right">{{ $quotation->paymentTerms->payment_terms }}</td>
                    </tr>
                </table>

            </td>
            @include('partials.pdf_header', ['object' => $quotation, 'is_sales' => false])
        </tr>
    </table>
    @include('partials.pdf_body', ['object' => $quotation, 'is_sales' => false])
@endsection
