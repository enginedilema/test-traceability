<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Codes</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .qr-code {
            display: inline-block;
            text-align: center;
            width: 18%; /* Ajustar para tener 3 elementos por fila */
            margin: 2px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    @foreach ($data as $item)
        <div class="qr-code">
            <img src="{{ $item['qr_code'] }}" alt="QR Code" style="display: block; margin: 0 auto;">
            <!-- <p>{{ $item['text'] }}</p> -->
        </div>

        @if ($loop->iteration % 65 == 0)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>