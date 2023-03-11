<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal_jawaban;

class FileController extends Controller
{
    public function upload (Request $request) {
        $file = $request->file('file');
        $file = new \SplFileObject($file->getRealPath(),'r');
        $file->setFlags(\SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_CSV);

        $header = $file->fgetcsv();

         while (!$file->eof()) {
        $row = $file->fgetcsv();
        if ($row) {
            $model = new Soal_jawaban();
            foreach ($header as $index => $columnName) {
                $model->id_mapel = $request->id_mapel;
                $model->id_kelas = $request->id_kelas;
                $model->{$columnName} = isset($row[$index]) ? $row[$index] : null;
            }
            $model->save();
        }
    }

    return response()->json([
        'Messsage'=>'Data imported'
    ]);
}}
