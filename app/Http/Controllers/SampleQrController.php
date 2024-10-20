<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Font\NotoSans;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Sample;
use App\Models\Status;

class SampleQrController extends Controller
{
    //
    public function createqr()
    {
        $data = [];
        for ($i = 1; $i <= 35; $i++) {
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $qrContent = 'Z' . $randomNumber;
    
        // Usar el builder para crear el QR con texto
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrContent)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(100)
            ->margin(5)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->labelText($qrContent)
            ->labelFont(new NotoSans(12))
            ->build();

        // Convertir el resultado en base64 para incrustar como imagen
        $qrCodeData = $result->getDataUri();

        // Añadir al array de datos para la vista
        $data[] = [
            'text' => $qrContent,
            'qr_code' => $qrCodeData,
        ];
        }
    // Generar el PDF a partir de la vista Blade
    $pdf = PDF::loadView('sample.createqr', compact('data'))
              ->setPaper('a4', 'portrait') // Configurar el tamaño del papel
              ->setWarnings(false); // No mostrar advertencias en el PDF

    // Descargar el PDF con los códigos QR
    //return view('sample.createqr', compact('data'));
    return $pdf->download('qrcodes.pdf');
    }

    public function availableqr()
    {
        $samples = Sample::where('status_id', Status::$NEW)->limit(35)->get();
        $data = [];
        foreach ($samples as $sample) {
            $qrContent = $sample->qr_code;
            $result = Builder::create()
            ->writer(new PngWriter())
            ->data($qrContent)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(100)
            ->margin(5)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->labelText($qrContent)
            ->labelFont(new NotoSans(12))
            ->build();

        // Convertir el resultado en base64 para incrustar como imagen
        $qrCodeData = $result->getDataUri();

        // Añadir al array de datos para la vista
        $data[] = [
            'text' => $qrContent,
            'qr_code' => $qrCodeData,
        ];
        }
    // Generar el PDF a partir de la vista Blade
    $pdf = PDF::loadView('sample.createqr', compact('data'))
              ->setPaper('a4', 'portrait') // Configurar el tamaño del papel
              ->setWarnings(false); // No mostrar advertencias en el PDF

    // Descargar el PDF con los códigos QR
    //return view('sample.createqr', compact('data'));
    return $pdf->download('qrcodes.pdf');


    }
}
