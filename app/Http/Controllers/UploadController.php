<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class UploadController extends Controller
{
	public function upload(){
		return view('upload');
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required',
			'keterangan' => 'required',
		]);
 
		
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
      	        // nama file
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';
 
      	        // ekstensi file
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
 
      	        // real path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';
 
      	        // ukuran file
		echo 'File Size: '.$file->getSize();
		echo '<br>';
 
      	        // tipe mime
		echo 'File Mime Type: '.$file->getMimeType();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
 
                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());
	}
	public function unggah_gambar(Request $request) {
	
		$gambar=$request->file('file');
		$url_gambar = $gambar->getClientOriginalName().".".$gambar->getClientOriginalExtension();
		$gambar->move('panunya_ojah/', $url_gambar );
		
		DB::table('gambar_panu')->insert([
			"url_gambar"=>$url_gambar
		]);

		return redirect(route('panunya_ojah'))->with('success', 'Gambar panunya ojah berhasil dimasukan kyaaa');





		
	}
}