<?php

namespace App\Http\Controllers;

use App\Model\Beneficiary;
use App\Model\BeneficiaryFile;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UploadFileRequest;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('layouts/beneficiary/uploadform');
    }

    public function uploadSubmit(UploadFileRequest $request)
    {
        $message = '';
        $messageClass = '';
        try{
            $beneficiary = Beneficiary::find($request->beneficiary_id);
            foreach ($request->files as $file) {
                $filename = $file[0]->move(public_path("uploads"));
                $filename = explode('/',$filename);
                BeneficiaryFile::create([
                    'beneficiary_id' => $beneficiary->id,
                    'filename' => end($filename)
                ]);
            }
            $message = 'File Uploaded Successfully!';
            $messageClass = 'alert alert-success';
        }catch (\Exception $ex){
            $message = 'Error Uploading File. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-danger';
        }


        return view('layouts/beneficiary/uploadform',array('message' =>$message,'messageClass' => $messageClass));

    }

    public function uploadedFiles(){
        return view('layouts/beneficiary/viewfileupload');
    }

    public function getUploadedFiles(Request $request ){
        $message = '';
        $messageClass = '';
        try{
            $beneficiary = Beneficiary::find($request->beneficiary_id);
            $files = BeneficiaryFile::getBeneficiaryFiles($request->beneficiary_id);
        }catch (\Exception $ex){
            $message = 'Error Uploading File. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-danger';
        }


        return view('layouts/beneficiary/viewfileupload',array('message' =>$message,'messageClass' => $messageClass,'files' => $files,'beneficiary' => $beneficiary));

    }
}
