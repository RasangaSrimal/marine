<td>
    <table class="border_none w100">
        <tr>
            <td>
        @if ($is_sales)
            <div class="text-right">
                請求NO。{{ $object->file_no }} <br>
                {{ $object->created_date }} 
            </div>
        @else
            <div class="text-right">
                見積NO。{{ $object->estimate_num }} <br>
                {{ $object->estimate_date }} 
            </div>
        @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="text-center seal">
                    〒{{ $base['postal_code'] }} {{ $base['address'] }} <br>
                    マリン大阪 株式会社 <br>
                    TEL {{ $base['tel'] }} FAX {{ $base['fax'] }} <br>
                    ﾎｰﾑﾍﾟｰｼﾞ https://www.marineosaka.co.jp/ <br><br>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <table class="border_none w100">
                    <tr>
                        <td style="width: 60%"></td>
                        <td style="width: 20%">
                            <table id="id_seal_table" style="width: 40%">
                                <thead>
                                    <tr>
                                        <td>責任者</td>
                                        <td>担当者</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="underline-table">
        @if ($is_sales)
            <tr>
                <td>使用 時間</td>
                <td colspan="3">{{ $object->usage_time }}</td>
            </tr>
        @endif
        <tr>
            <td>船名</td>
            <td colspan="3">{{ optional(optional(optional($object)["customer"])["ship"])['name'] }}</td>
        </tr>
        <tr>
            <td>艇種</td>
            <td>{{ optional(optional(optional(optional($object)["customer"])["ship"])['boatTypeMaster'])['name'] }}</td>
            <td>艇番</td>
            <td>{{ optional(optional(optional($object)["customer"])["ship"])['boat_no'] }}</td>
        </tr>
        <tr>
            <td>ｴﾝｼﾞﾝ機種</td>
            <td>{{ optional(optional(optional($object)["customer"])["ship"])['model'] }}</td>
            <td colspan=2>
                R {{ optional(optional(optional($object)["customer"])["ship"])['engine_num_r'] }}
                L {{ optional(optional(optional($object)["customer"])["ship"])['engine_num_l'] }}
            </td>
        </tr>
        <tr>
            <td>検査　番号</td>
            <td>{{ optional(optional(optional($object)["customer"])["ship"])['inspection_num'] }}</td>
            <td>検査日</td>
            <td>{{ optional(optional(optional($object)["customer"])["ship"])['inspection_date'] }}</td>
        </tr>
        <tr>
            <td>保管　場所</td>
            <td colspan="3">{{ optional(optional(optional($object)["customer"])["ship"])['location'] }}</td>
        </tr>
    </table>
</td>
