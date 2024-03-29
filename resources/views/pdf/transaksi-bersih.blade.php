<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laba Bersih</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 10px;
        }

        header {
            position: fixed;
            top: -15px;
            left: 0px;
            right: 0px;
            height: 50px;
            color: white;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 80px;
            font-size: 80%;
            text-align: center;
            line-height: 18px;
        }

        th {
            padding: 5px;
        }

        .water-mark {
            position: absolute;
            top: 50%;  /* position the top  edge of the element at the middle of the parent */
            left: 50%; /* position the left edge of the element at the middle of the parent */

            transform: translate(-50%, -50%);
            opacity: 0.3;
        }


        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        /* .pr-10 {
            padding-right: 10px;
        }

        .pl-10 {
            padding-left: 10px;
        } */

        .table-auto {
            width: auto;
        }

        .border-table {
            border: 0.5px solid black;
            border-collapse: collapse;
        }

        .pl-8 {
            padding-left: 8px;
        }

        .list-decimal {
            list-style-type: decimal;
        }

        .pr-20 {
            padding-right: 20px;
        }

        .flex-center {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .bold-text {
            font-weight: 800;
            margin-bottom: 10px;
        }

        .font-table {
            font-size: 12px;
            text-align: center
        }
    </style>
</head>

<div>
</div>

<body class="pr-80 pl-80 ">
    <main>
        <div class="text-right">
            <p></p>
        </div>
        <div class="text-center">
            <p class="bold-text">Laporan Laba Bersih </p>
            <!-- this will be by save file -->
        </div>
        <span class="font-table">Tanggal : <?php echo date("d-m-Y"); ?></span>
        <div class="pr-10 pl-10">
            <table class="w-full border-table">
                <tr class="border-table">
                    <th class="border-table font-table">No</th>
                    <th class="border-table font-table">Tanggal Penjualan</th>
                    <th class="border-table font-table">Nama Barang</th>
                    <th class="border-table font-table">Penjualan Barang</th>
                    <th class="border-table font-table">Harga Barang</th>
                    <th class="border-table font-table">Harga Jual</th>
                    <th class="border-table font-table">Laba</th>
                </tr>
                @foreach($transaksi as $i => $value)
                <tr class="border-table">
                    <td class="border-table font-table">{{$i+1}}</td>
                    <td class="border-table font-table">{{$value->transaksi->tgl_transaksi}}</td>
                    <td class="border-table font-table">{{$value->barang->nama}}</td>
                    <td class="border-table font-table">{{$value->jumlah_barang}}</td>
                    <td class="border-table font-table">{{$value->barang->hpp}}</td>
                    <td class="border-table font-table">Rp. {{$value->barang->harga_jual}}</td>
                    <td class="border-table font-table">{{$value->barang->harga_jual - $value->barang->hpp}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>
</html>
