<?php
$tarih = file_get_contents('resp.json');
$tarih = json_decode($tarih, true);
$randomCaount = rand(0, count($tarih) - 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tarihte Bugün | Syntax</title>
    <meta name="description" content="Tarihte Bugün"/>
    <meta name="keywords" content="tarihte bugün,tarihte bugün ne oldu,tarih,bugün,tarihte"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">body {
            background-color: #eee
        }

        body, h1, p {
            font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: normal;
            margin: 0;
            padding: 0;
            text-align: center
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            margin-top: 177px;
            max-width: 1170px;
            padding-right: 15px;
            padding-left: 15px
        }

        .row:before, .row:after {
            display: table;
            content: " "
        }

        h1 {
            font-size: 48px;
            font-weight: 300;
            margin: 0 0 20px 0
        }

        .lead {
            font-size: 21px;
            font-weight: 200;
            margin-bottom: 20px
        }

        p {
            margin: 0 0 10px
        }

        a {
            color: #3282e6;
            text-decoration: none
        }</style>
</head>

<body>
<div class="container text-center" id="error">

    <svg height="100" width="100">
        <circle cx="50" cy="50" r="31" stroke="#679b08" stroke-width="9.5" fill="none"/>
        <circle cx="50" cy="50" r="6" stroke="#679b08" stroke-width="1" fill="#679b08"/>
        <line x1="50" y1="50" x2="35" y2="50" style="stroke:#679b08;stroke-width:6"/>
        <line x1="65" y1="35" x2="50" y2="50" style="stroke:#679b08;stroke-width:6"/>
        <path d="M59 65 L83 65 L75 87 Z" fill="#679b08"/>
        <rect width="20" height="9" x="70" y="56" style="fill:#eee;stroke-width:0;"/>
    </svg>
    <div class="row">
        <div class="col-md-12">
            <div class="main-icon text-success"><span class="uxicon uxicon-clock-refresh"></span></div>
            <h2><?php echo date('d') . '.' . date('m') . '.' . $tarih[$randomCaount]['tarih']; ?></h2>
            <h1 style="font-size:130%"><?php echo $tarih[$randomCaount]['olay']; ?></h1>
        </div>
    </div>

</div>

</body>
</html>
