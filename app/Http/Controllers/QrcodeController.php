<?php

namespace App\Http\Controllers;

use App\Models\schadule;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        // $data = DB::table('student')->select('name','desc')->where('id',1)->get();
        $name_doctor =  $request->name;
        $nameqr='uploads/'.$name_doctor .'.png';
        // $path = Storage::disk('uploads')->put('uploads', $imagePath);
        $size = 300;
        $qrCode = QrCode::format('png')->size($size)->color(31, 122, 140)->eye('circle')
        ->merge(('/public/uploads/logo/Group 1 (1).png'), .5)->errorCorrection('H')
        ->generate("$name_doctor,33", '../public/'. $nameqr);
        // $x= schadule::create([
        //     'name'=>$request->name,
        //     'desc'=>'hell',
        //     'qr' => $nameqr,
        // ]);
            return response()->json([
                'msg'=>'ok',
                // 'test'=>$x
            ]);
    }
}
