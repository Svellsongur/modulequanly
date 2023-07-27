<?php

    //upload file
    function uploadfile($nameFolder, $file){
        $fileName = time().''.$file->getClientOriginalName();
        return $file->storeAS($nameFolder, $fileName, 'public');
    }