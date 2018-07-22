<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Validasi User</title>
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets1/css/styleInvoice.css" media="all" /> -->

    <style type="text/css">
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }


        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>

</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="<?php echo base_url();?>assets1/img/logo_indoprima.png">
    </div>
    <div id="company">
        <h2 class="name">Indo Prima Beef</h2>
        <div>JL. Agus Salim No.24, Bandarjaya, Lampung Tengah </div>
        <div>+62811 791 551</div>
        <div><a href="#">indoprimabeef@gmail.com</a></div>
    </div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">Kepada :</div>
            <h2 class="name"><?php echo $nama_customer; ?></h2>
            <div class="address"><?php echo $alamat_customer; ?></div>
        </div>
        <div id="invoice">
            <h1>Data User IndoPrimaBeef</h1>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="desc" colspan="2"><h3>Username</h3></td>
            <td class="total"><?php echo $user_name; ?></td>
        </tr>
        <tr>
            <td class="desc" colspan="2"><h3>Password</h3></td>
            <td class="total"><?php echo $password_ku; ?></td>
        </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div id="thanks">Silahkan login ke website IndoPrimaBeef dengan akun ini, terima kasih!</div>
    <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">Pastikan tidak memberikan informasi data user anda kepada siapapun</div>
    </div>
</main>
<footer>
    <!--Invoice was created on a computer and is valid without the signature and seal.-->
   Copyright IndoPrimaBeef 2018
</footer>
</body>
</html>

Setelan berbagi
