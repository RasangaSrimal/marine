<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MARINE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">

    <style>
    .border1 { border: 1px solid black; }

    .w100 { width: 100%; }
    .w50 { width: 50%; }
    
    .text-center, .center { text-align: center; }
    .text-right, .right { text-align: right; }
    .text-left, .left { text-align: left; }

    .underline-table {
        border: none; 
        width: 100%;
    }
    .underline-table td { border-bottom: 1px solid; }
    .seal{
        background-image: url("{{ public_path() }}/assets/img/角印.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 25%;
    }
    #id_seal_table td { border: 1px solid; }
    #id_seal_table tbody td { height: 50px; }
    #id_seal_table thead td { text-align: center }
    #id_cost_table tr td:last-child {
        text-align: right; 
        border-left: 1px solid;
    }

    body {
        font-family: ipag;
        font-size: 75%;
    }

    table, th, td {
        border-collapse: collapse;
        border: 1px solid black;
    }

    th, td {
    }
    .border_none, th, td{
        border: none;
    }
    .column2 {
        float: left;
        width: 50%;
        padding-left: 10px;
        padding-right: 10px;
        height: 350px; /* Should be removed. Only for demonstration */
    }

    /*
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    */

    hr {
        margin: 0.05em auto; 
        border-top: 1px solid;
    }

    @font-face{
        font-family: ipag;
        font-style: normal;
        font-weight: normal;
        src:url('{{ storage_path("fonts/ipag.ttf") }}');
    }
    @font-face{
        font-family: ipag;
        font-style: bold;
        font-weight: bold;
        src:url('{{ storage_path("fonts/ipag.ttf") }}');
    }
    </style>

</head>
<body>
    @yield('content')
</body>
</html>
