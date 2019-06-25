<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{

	/* this class helps with handling of storage*/

	public static function getURL($file) {

		$file = substr($file, 7);

		$storage = "storage/".$file;
        return url($storage);

	}

  public function getDownload(){
        $file = public_path()."/downloads/info.pdf";
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'info.pdf',$headers);
    }

	public static function rand_color() {
	    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}



}
