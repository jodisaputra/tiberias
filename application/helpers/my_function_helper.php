<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Fungsi untuk membuat tanggal dengan format Indonesia
function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}

// Fungsi untuk membuat bulan dengan format Indonesia
function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	}
	

// Fungsi untuk melakukan input data	
function inputtext($name, $table, $field, $primary_key, $selected){
	$ci = get_instance();
	$data = $ci->db->get($table)->result();
	foreach($data as $t){
		if($selected == $t->$primary_key){
		$txt = $t->$field;
		}
	}
	return $txt;
}

// Fungsi untuk menampilkan data dalam bentuk combobox
function combobox($name, $table, $field, $primary_key, $selected){
	$ci = get_instance();
	$cmb = "<select name='$name' class='form-control'>";
	$data = $ci->db->get($table)->result();
	$cmb .="<option value=''>-- PILIH --</option>";
	foreach($data as $d){		
		$cmb .="<option value='".$d->$primary_key."'";
		$cmb .= $selected==$d->$primary_key?"selected='selected'":'';
		$cmb .=">". strtoupper($d->$field)."</option>";
	}
	$cmb .="</select>";
	return $cmb;
}

//fungsi SEO
function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
} 
