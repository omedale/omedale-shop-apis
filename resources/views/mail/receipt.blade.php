<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
            *{
              margin: 0;
              box-sizing: border-box;
              -webkit-print-color-adjust: exact;
            }
            body{
              background: #E0E0E0;
              font-family: 'Roboto', sans-serif;
            }
            ::selection {background: #f31544; color: #FFF;}
            ::moz-selection {background: #f31544; color: #FFF;}
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
            .col-left {
                float: left;
            }
            .col-right {
                float: right;
            }
            h1{
              font-size: 1.5em;
              color: #444;
            }
            h2{font-size: .9em;}
            h3{
              font-size: 1.2em;
              font-weight: 300;
              line-height: 2em;
            }
            p{
              font-size: .75em;
              color: #666;
              line-height: 1.2em;
            }
            a {
                text-decoration: none;
                color: #00a63f;
            }

            #invoiceholder{
              width:100%;
              height: 100%;
              padding: 50px 0;
            }
            #invoice{
              position: relative;
              margin: 0 auto;
              width: 700px;
              background: #FFF;
            }

            [id*='invoice-']{
              padding: 20px;
            }

            #invoice-top{}
            #invoice-mid{min-height: 110px;}
            #invoice-bot{ min-height: 240px;}

            .logo{
                display: inline-block;
                vertical-align: middle;
                width: 110px;
                overflow: hidden;
            }
            .info{
                display: inline-block;
                vertical-align: middle;
                margin-left: 20px;
            }
            .logo img,
            .clientlogo img {
                width: 100%;
            }
            .clientlogo{
                display: inline-block;
                vertical-align: middle;
                width: 50px;
            }
            .clientinfo {
                display: inline-block;
                vertical-align: middle;
                margin-left: 20px
            }
            .title{
              float: right;
            }
            .title p{text-align: right;}
            #message{margin-bottom: 30px; display: block;}
            h2 {
                margin-bottom: 5px;
                color: #444;
            }
            .col-right td {
                color: #666;
                padding: 5px 8px;
                border: 0;
                font-size: 0.75em;
                border-bottom: 1px solid #eeeeee;
            }
            .col-right td label {
                margin-left: 5px;
                font-weight: 600;
                color: #444;
            }
            table{
              width: 100%;
              border-collapse: collapse;
            }
            td{
                padding: 10px;
                border-bottom: 1px solid #cccaca;
                font-size: 0.70em;
                text-align: left;
            }

            .tabletitle th {
              border-bottom: 2px solid #ddd;
              text-align: right;
            }
            .tabletitle th:nth-child(2) {
                text-align: left;
            }
            th {
                font-size: 0.7em;
                text-align: left;
                padding: 5px 10px;
            }
            .item{width: 50%;}
            .list-item td {
                text-align: right;
            }
            .list-item td:nth-child(2) {
                text-align: left;
            }
            .total-row th,
            .total-row td {
                text-align: right;
                font-weight: 700;
                font-size: .75em;
                border: 0 none;
            }
            .amount {
                text-align: right !important;
            }
            .effect2
            {
              position: relative;
            }
            .effect2:before, .effect2:after
            {
              z-index: -1;
              position: absolute;
              content: "";
              bottom: 15px;
              left: 10px;
              width: 50%;
              top: 80%;
              max-width:300px;
              background: #777;
              -webkit-box-shadow: 0 15px 10px #777;
              -moz-box-shadow: 0 15px 10px #777;
              box-shadow: 0 15px 10px #777;
              -webkit-transform: rotate(-3deg);
              -moz-transform: rotate(-3deg);
              -o-transform: rotate(-3deg);
              -ms-transform: rotate(-3deg);
              transform: rotate(-3deg);
            }
            .effect2:after
            {
              -webkit-transform: rotate(3deg);
              -moz-transform: rotate(3deg);
              -o-transform: rotate(3deg);
              -ms-transform: rotate(3deg);
              transform: rotate(3deg);
              right: 10px;
              left: auto;
            }
            @media screen and (max-width: 767px) {
                h1 {
                    font-size: .9em;
                }
                #invoice {
                    width: 100%;
                }
                #message {
                    margin-bottom: 20px;
                }
                [id*='invoice-'] {
                    padding: 20px 10px;
                }
                .logo {
                    width: 140px;
                }
                .title {
                    float: none;
                    display: inline-block;
                    vertical-align: middle;
                    margin-left: 40px;
                }
                .title p {
                    text-align: left;
                }
                .col-left,
                .col-right {
                    width: 100%;
                }
                .table {
                    margin-top: 20px;
                }
                #table {
                    white-space: nowrap;
                    overflow: auto;
                }
                td {
                    white-space: normal;
                }

                .table-main {
                    border: 0 none;
                }
                  .table-main thead {
                    border: none;
                    clip: rect(0 0 0 0);
                    height: 1px;
                    margin: -1px;
                    overflow: hidden;
                    padding: 0;
                    position: absolute;
                    width: 1px;
                  }
                  .table-main tr {
                    border-bottom: 2px solid #eee;
                    display: block;
                    margin-bottom: 20px;
                  }
                  .table-main td {
                    font-weight: 700;
                    display: block;
                    padding-left: 40%;
                    max-width: none;
                    position: relative;
                    border: 1px solid #cccaca;
                    text-align: left;
                  }
                  .table-main td:before {
                    content: attr(data-label);
                    position: absolute;
                    left: 10px;
                    font-weight: normal;
                    text-transform: uppercase;
                  }
                .total-row th {
                    display: none;
                }
                .total-row td {
                    text-align: left;
                }
                footer {text-align: center;}
            }

    </style>
    </head>
    <body>
        <div id="invoiceholder">
        <div id="invoice" class="effect2">

            <div id="invoice-top">
            <div class="title">
                <h1>Invoice #<span class="invoiceVal invoice_num">test-inv65728</span></h1>
            </div>
            </div>



            <div id="invoice-bot">

            <div id="table">
                <table class="table-main">
                <thead>
                    <tr class="tabletitle">
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach ($details['orderDetails'] as $order)
                    <tr class="list-item">
                        <td data-label="Type" class="tableitem">{{ $order->product_name }}</td>
                        <td data-label="Quantity" class="tableitem">{{ $order->quantity }}</td>
                        <td data-label="Unit Price" class="tableitem">{{ $order->unit_cost }}</td>
                        <td data-label="Total" class="tableitem">{{ ($order->quantity * (float)$order->unit_cost) }}</td>
                    </tr>
                @endforeach
                <tr class="list-item total-row">
                    <th colspan="3" class="tableitem">Tax ( {{ $details['tax_percentage'] }} )%</th>
                    <td data-label="Tax" class="tableitem amount">{{ $details['tax_price'] }}</td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="3" class="tableitem">Shipping</th>
                    <td data-label="Shipping" class="tableitem amount">{{ $details['shipping_price'] }}</td>
                </tr>
                <tr class="list-item total-row">
                    <th colspan="3" class="tableitem">Total</th>
                    <td data-label="Total" class="tableitem amount">{{ $details['total_amount'] }}</td>
                </tr>
                </table>
            </div>

            </div>
        </div>
        </div>
    </body>
</html>
