<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan=2>【作業明細】　　　　　作業内容</th>
                            <th style="width: 20%">単価</th>
                            <th style="width: 8%">数</th>
                            <th style="width: 2%"></th>
                            <th style="width: 15%">請求金額</th>
                        </tr>
                        <tr class="d-none">
                            <th style="width: 5%"></th>
                            <td><input name="content[]" class="content form-control" value="" /></td>
                            <td><input type="number" name="unit_price[]" class="unit_price form-control" value="" /> </td>
                            <td><input type="number" name="quantity[]" class="quantity form-control" value="" /></td>
                            <td>式</td>
                            <td><input name="total_price[]" class="total_price form-control" value="" readonly/></td>
                        </tr>
                    </thead>
                    <tbody class="calc_total" data-output="id_wage_total">
                        @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <th style="width: 5%"></th>
                            <td>{{ Form::text("content[$i]", null, ["class" => "content form-control"]) }}</td>
                            <td>{{ Form::number("unit_price[$i]", null, ["class" => "unit_price form-control"]) }}</td>
                            <td>{{ Form::number("quantity[$i]", null, ["class" => "quantity form-control"]) }}</td>
                            <td>式</td>
                            <td><input name="total_price[]" class="total_price form-control" value="" readonly/></td>
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=2><button type="button" class="addRow btn btn-link"><i class="fa fa-plus"></i> 行を追加</button></td>
                            <td></td>
                            <td colspan=2>
                                <div class="p-2">工賃小計</div>
                            </td>
                            <td><input readonly class="form-control"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan=2>【部品明細】　　　　　部品番号</th>
                            <th style="width: 24%">名称</th>
                            <th style="width: 15%">部品単価</th>
                            <th style="width: 8%">数量</th>
                            <th style="width: 2%"></th>
                            <th style="width: 15%">請求金額</th>
                        </tr>
                        <tr class="d-none">
                            <th style="width: 5%"></th>
                            <td><input name="part_number[]" class="content form-control" value="" disabled="disabled"></td>
                            <td><input name="part_name[]" class="content form-control" value="" disabled="disabled"></td>
                            <td><input type="number" name="part_unit_price[]" class="unit_price form-control" value="" disabled="disabled"></td>
                            <td><input type="number" name="part_quantity[]" class="quantity form-control" value="" disabled="disabled"></td>
                            <td>個</td>
                            <td><input name="part_total_price[]" class="total_price form-control" value="" disabled="disabled"></td>
                        </tr>
                    </thead>
                    <tbody class="calc_total" data-output="id_part_total">
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <th style="width: 5%"></th>
                            <td>{{ Form::text("part_number[]", data_get($object->parts, "$i.number"), ["class" => "form-control"]) }}</td>
                            <td>{{ Form::text("part_name[]", data_get($object->parts, "$i.name"), ["class" => "form-control"]) }}</td>
                            <td>{{ Form::number("part_unit_price[]", data_get($object->parts, "$i.unit_price"), ["class" => "unit_price form-control"]) }}</td>
                            <td>{{ Form::number("part_quantity[]", data_get($object->parts, "$i.quantity"), ["class" => "quantity form-control"]) }}</td>
                            <td>個</td>
                            <td> <input name="part_total_price[]" class="total_price form-control" value="" readonly/> </td>
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=2><button type="button" class="addRow btn btn-link"><i class="fa fa-plus"></i> 行を追加</button></td>
                            <td></td>
                            <td></td>
                            <td colspan=2>
                                <div class="p-2">部品小計</div>
                            </td>
                            <td><input readonly class="form-control"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan=2>【諸経費明細】　　　　　諸経費内容</th>
                            <th style="width: 15%">単価</th>
                            <th style="width: 8%">数</th>
                            <th style="width: 2%"></th>
                            <th style="width: 15%">請求金額</th>
                        </tr>
                        <tr class="d-none">
                            <th style="width: 5%"></th>
                            <th> 
                                <div class="input-group mb-2">{!! Form::select('expense_detail_id[]', $expenseDetail, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}</div>
                            </th>
                            <td><input type="number" name="expense_unit_price[]" class="unit_price form-control" value="" disabled="disabled"> </td>
                            <td><input type="number" name="expense_quantity[]" class="quantity form-control" value="" disabled="disabled"></td>
                            <td>式</td>
                            <td><input name="expense_total_price[]" class="total_price form-control" value="" disabled="disabled"></td>
                        </tr>
                    </thead>
                    <tbody class="calc_total" data-output="id_expense_total">
                        @for ($i = 0; $i<5; $i++)
                            <tr>
                                <th style="width: 5%"></th>
                                <th> 
                                    <div class="input-group mb-2">
                                    {!! Form::select('expense_detail_id[]', $expenseDetail, data_get($object->expenses, "$i.id"), ['class' => 'form-control']) !!}
                                    </div>
                                </th>
                                <td>{{ Form::number("expense_unit_price[]", data_get($object->expenses, "$i.unit_price"), ["class" => "unit_price form-control"]) }}</td>
                                <td>{{ Form::number("expense_quantity[]", data_get($object->expenses, "$i.quantity"), ["class" => "quantity form-control"]) }}</td>
                                <td>式</td>
                                <td><input name="total_price[]" class="total_price form-control" value="" readonly/></td>
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=2><button type="button" class="addRow btn btn-link"><i class="fa fa-plus"></i> 行を追加</button></td>
                            <td></td>
                            <td colspan=2>
                                <div class="p-2">諸経費小計</div>
                            </td>
                            <td><input readonly class="form-control"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
