@extends('layouts.user')

@section('scripts')
    <script>
        taxRate = {{ $tax_rate / 100 }};
        customers = @json($customers);
        companies = @json($companies);
        ships = @json($ships);
    </script>
    <script src="/js/sales_quotation.js"></script>
@endsection
