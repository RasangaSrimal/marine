<table class="w100" id="id_cost_table">
    <tr>
        <th class="border1 center" colspan="5">内　　　　　　　　訳</th>
        <th class="border1 center">金　　額</th>
    </tr>
    <tr>
        <td colspan=5>【技術料】</td>
        <td></td>
    </tr>
    @foreach($object->workingDetails as $work)
        <tr>
            <td></td>
            <td>{{ $work->content }}</td>
            <td></td>
            <td class="text-right">{{ $work->unit_price }}</td>
            <td class="text-right">{{ $work->quantity }}　式</td>
            <td class="text-center">{{ $work->unit_price * $work->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(技術料小計)</td>
        <td>{{ $object->workTotal() }}</td>
        <td></td>
    </tr>
    <tr>
        <td colspan=5>&nbsp;</td>
        <td></td>
    </tr>
    <tr>
        <td colspan=3>【部品】</td>
        <td class="text-center" style="width: 15%">単価</td>
        <td class="text-center" style="width: 15%">数量</td>
        <td></td>
    </tr>
    @foreach($object->parts as $part)
        <tr>
            <td></td>
            <td>{{ $part->number }}</td>
            <td>{{ $part->name }}</td>
            <td class="text-right">{{ $part->unit_price }}</td>
            <td class="text-right">{{ $part->quantity }}　個</td>
            <td>{{ $part->unit_price * $part->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(部品小計)</td>
        <td>{{ $object->partTotal() }}</td>
        <td></td>
    </tr>
    <tr>
        <td colspan=5>&nbsp;</td>
        <td></td>
    </tr>
    <tr>
        <td colspan=5>【諸経費】</td>
        <td></td>
    </tr>
    @foreach($object->expenses as $expense)
        <tr>
            <td></td>
            <td>{{ $expense["expenseDetail"]["expense_detail"] }}</td>
            <td></td>
            <td class="text-right">{{ $expense->unit_price }}</td>
            <td class="text-right">{{ $expense->quantity }}　式</td>
            <td>{{ $expense->unit_price * $expense->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>(諸経費小計)</td>
        <td>{{ $object->expenseTotal() }}</td>
        <td></td>
    </tr>
    @for($i = 0; $i < 16 - $object->workingDetails->count() - $object->parts->count() - $object->expenses->count(); $i++)
        <tr><td colspan=5>&nbsp;</td><td></td></tr>
    @endfor
    @if ($is_sales)
        <tr>
            <td class="border1" colspan="5">技術料 小計</td>
            <td class="border1">{{ $object->workTotal() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">部品  小計</td>
            <td class="border1">{{ $object->partTotal() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">出張費（諸経費含む）</td>
            <td class="border1">{{ $object->expenseTotal() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">値引き</td>
            <td class="border1">{{ $object->discount }}</td>
        </tr>
        <tr>
            <th class="border1" colspan="5">請求額小計</th>
            <th class="border1 right">{{ $object->beforeTax() }}</th>
        </tr>
        <tr>
            <td class="border1" colspan="5">消費税</td>
            <td class="border1">{{ $object->withTax() - $object->beforeTax() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5"> </td>
            <td class="border1" style="height:2%"> </td>
        </tr>
        <tr>
            <th class="border1 center" colspan="5">合　　　　計</th>
            <th class="border1 right">{{ $object->withTax() }}</th>
        </tr>
    @else
        <tr>
            <td class="border1" colspan="5">その他</td>
            <td class="border1">123</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">小　計</td>
            <td class="border1">{{ $object->beforeTax() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">消費税</td>
            <td class="border1">{{ $object->withTax() - $object->beforeTax() }}</td>
        </tr>
        <tr>
            <td class="border1" colspan="5">非課税扱い項目</td>
            <td class="border1">0</td>
        </tr>
        <tr>
            <th class="border1 center" colspan="5">合　　　　計</th>
            <th class="border1 right">{{ $object->withTax() }}</th>
        </tr>
        <tr>
            <td class="border1" colspan="6" style="text-align: left">
                備考<br>&nbsp;
            </td>
        </tr>
    @endif
</table>
