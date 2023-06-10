<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function createBill(Request $request, $id=0)
    {
        $bill = new  Bill();
        $destination = "public/images/pdf";
        $image = $request->file('image');

        $imageName = $image->getClientOriginalName();
        $image->storeAs($destination, $imageName);
        $bill->path = $imageName;
        if($id!=null){
            $bill->sale = $id;
        }
        $bill->save();
        return response()->json($bill, 200);


    }
    public function getArchivesByDate()
    {
        $archives =Bill::select( 'created_at','path')
            ->orderBy('created_at')
            ->get();

        $formattedArchives = [];
        foreach ($archives as $archive) {
            $date = Carbon::parse($archive->created_at);
            $year = $date->year;
            $month = $date->format('m');
            $monthNames = [
                '01' => 'Janvier',
                '02' => 'Février',
                '03' => 'Mars',
                '04' => 'Avril',
                '05' => 'Mai',
                '06' => 'Juin',
                '07' => 'Juillet',
                '08' => 'Août',
                '09' => 'Septembre',
                '10' => 'Octobre',
                '11' => 'Novembre',
                '12' => 'Décembre',
            ];
            // Group archives by year, month, and day
            $formattedArchives[$year][$monthNames[$month]][]= $archive->path;

        }

        if (empty($formattedArchives)) {
            $formattedArchives = (object)[]; // Convert to empty object to ensure it is returned as an empty object {}
        }

        return response()->json($formattedArchives );
    }
    public function getAllFiles(){
        $archives =Bill::select( 'path')
            ->get();
        $data=[];
        foreach ($archives as $archive){
            $data[]=$archive->path;
        }
       return response()->json($data );
    }
}
