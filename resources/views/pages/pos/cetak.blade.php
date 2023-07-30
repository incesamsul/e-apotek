<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <style>
        table {
            width: 100px;
            font-size: 10px;
        }
    </style>
</head>

<body>


    <a href="{{ URL::to('/kasir/pos') }}">kembali</a>

    <div id="printArea">
        <table style="width: 100px;font-size: 10px;" border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td align="center" colspan="3">Apotek wahid farma</td>
            </tr>
            <tr>
                <td align="center" colspan="3">-----------------------------------------------------</td>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach ($tagihan as $row)
                @php
                    $total += $row->barang->harga * $row->qty;
                @endphp
                <tr>
                    <td align="right">{{ $row->qty }} x </td>
                    <td>{{ $row->barang->nama_barang }}</td>
                    <td align="right">Rp. {{ number_format($row->barang->harga * $row->qty) }}</td>
                </tr>
            @endforeach
            <tr>
                <td align="center" colspan="3">-----------------------------------------------------</td>
            </tr>
            <tr>
                <td align="center" colspan="2">Total</td>
                <td align="right">Rp. {{ number_format($total) }}</td>
            </tr>
            <tr>
                <td align="center" colspan="2">Pembayaran</td>
                <td align="right">Rp. {{ number_format($pembayaran) }}</td>
            </tr>
            <tr>
                <td align="center" colspan="2">Kembalian</td>
                <td align="right">Rp. {{ number_format($pembayaran - $total) }}</td>
            </tr>
        </table>
    </div>

    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        // Define the options for silent printing
        const options = {
            printable: 'printArea', // the ID of the element to print
            type: 'html',
            silentPrint: true // hide the print dialog
        };

        printJS({
            printable: 'printArea',
            type: 'html',
            onPrintDialogClose: function() {
                // This function will be called after the print dialog is closed
                console.log('Print dialog closed.');
                document.location.href = '/kasir/pos';
            },
            onError: function() {
                // This function will be called if an error occurs
                console.log('An error occurred while printing.');
            },
            onPrintStart: function() {
                // This function will be called before the print dialog is opened
                console.log('Printing...');
            }
        })

        document.addEventListener('keydown', function(event) {
            if (event.keyCode === 27) {
                document.location.href = '/kasir/pos';
            }
        });
    </script>
</body>

</html>
