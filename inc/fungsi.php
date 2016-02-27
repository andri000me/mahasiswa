<?php 

    function ubahDate($tangga = null){

        if ($tangga == null) {
            return false;
        }else{
            $o = explode("/", $tangga);
            $d = $o[0];
            $m = $o[1];
            $t = $o[2];
            $gab = array($t, $m, $d);
            $hasil = implode("-", $gab);

            return $hasil;    
        }
        
    }

    

	function tanggal($tangal){
    	$pecah = explode("-", $tangal);
    	$tahun = $pecah[0];
    	$bulan = $pecah[1];
    	$hari = $pecah[2];
    	switch ($bulan) {
    		case '01':
    			$bulan = "Januari";
    			break;
    		case '02':
    			$bulan = "Februari";
    			break;
    		case '03':
    			$bulan = "Maret";
    			break;
    		case '04':
    			$bulan = "April";
    			break;
    		case '05':
    			$bulan = "Mei";
    			break;
    		case '06':
    			$bulan  = "Juni";
    			break;
    		case '07':
    			$bulan = "Juli";
    			break;
    		case '08':
    			$bulan = "Agustus";
    			break;
    		case '09':
    			$bulan = "September";
    			break;
    		case '10':
    			$bulan = "Oktober";
    			break;
    		case '11':
    			$bulan = "November";
    			break;
    		case '12':
    			$bulan = "Desember";
    			break;
       	}
    	$piece = array($hari,$bulan,$tahun);
    	$jadi = implode(" ", $piece);
    	return $jadi;
    }

    function gender($j_kel){
    	if ($j_kel == "perempuan") {
    		$jadi = ucwords($j_kel);
    		return $jadi;
    	}else{
	    	$pecah = explode("-", $j_kel);
	    	$l1 = ucfirst($pecah[0]);
	    	$l2 = ucfirst($pecah[1]);
			
			$piece = array($l1,$l2);
			$jadi = implode(" ",$piece);
			return $jadi;
		}
    }

    function hitung($absen, $tugas, $uts, $akhir){
        $hasil = (($absen + $tugas + $uts + $akhir) / 4);
        
        if ($hasil > 90) {
            $predikat = "A";
        }elseif ($hasil >= 80) {
            $predikat = "B";
        }elseif ($hasil >= 70) {
            $predikat = "C";
        }elseif ($hasil >= 55) {
            $predikat = "D";
        }else{
            $predikat = "E";
        }

        return $predikat;
    }

    function cek_semester($mahasiswa){
        include "../../inc/koneksi.php";
        $sql = "SELECT semester FROM tb_semester WHERE mahasiswa = '$mahasiswa'";
        $sqlexe = $mysqli->query($sql);
        $hasil = $sqlexe->fetch_assoc();

        return $hasil['semester'];
    }

    function cek_mahasiswa($mahasiswa){
        include "inc/koneksi.php";
        $sql = "SELECT nama_siswa FROM tb_mahasiswa WHERE nis = '$mahasiswa'";
        $sqlexe = $mysqli->query($sql);
        $hasil = $sqlexe->fetch_assoc();

        return $hasil['nama_siswa'];
    }

    function predikat($pret){

        switch ($pret) {
            case 'E':
                $nilai = "<span style='color: red'><strong>".$pret."<strong></span>";
                break;

            case 'D':
                $nilai = "<span style='color: red'><strong>".$pret."<strong></span>";
                break;

            case 'C':
                $nilai = "<span style='color: red'><strong>".$pret."<strong></span>";
                break;
            
            default:
                $nilai = "<span style='color: black'><strong>".$pret."<strong></span>";
                break;
        }

        return $nilai;
    }

 ?>