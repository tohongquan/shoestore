<?php

namespace App\Traits;


trait UploadFile
{
    public static function str_ran($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function storageUpload($request, $fileName, $folderName)
    {
        if ($request->hasFile($fileName)) {
            $file = $request->$fileName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = self::str_ran(20) . '.' . $file->getClientOriginalExtension();
            $request->file($fileName)->storeAs('public/uploads/' . $folderName . '', $fileNameHash);
            $filePath = '/storage/uploads/' . $folderName . '/' . $fileNameHash;
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_data' => $filePath
            ];
            return $dataUpload;
        }
        return null;
    }

    public function storageUpload_Multiple($fileName, $folderName)
    {
        $fileNameOrigin = $fileName->getClientOriginalName();
        $fileNameHash = self::str_ran(20) . '.' . $fileName->getClientOriginalExtension();
        $fileName->storeAs('public/uploads/' . $folderName . '', $fileNameHash);
        $filePath = '/storage/uploads/' . $folderName . '/' . $fileNameHash;
        $dataUpload = [
            'file_name' => $fileNameOrigin,
            'file_data' => $filePath
        ];
        return $dataUpload;
    }

    
}
