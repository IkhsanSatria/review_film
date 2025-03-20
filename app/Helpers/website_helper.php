<?php
use App\Models\Konfigurasi_model;
use App\Models\User_model;



// cheklogin
function checklogin()
{
  helper("url");
  $m_user = new User_model();
  $session = \Config\Services::session();
  if ($session->get("email") == "" || $session->get("email") == null || $session->get("role") != "admin") {
    echo "<script>";
    echo 'window.location.href = "' . base_url("adminlogin") . '?login=belum";';
    echo "</script>";
  } else {
    //whether ip is from share internet
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
      $ip_address = $_SERVER["HTTP_CLIENT_IP"];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    //whether ip is from remote address
    else {
      $ip_address = $_SERVER["REMOTE_ADDR"];
    }

    $data = ["id_user" => $session->get("id_user"), "ip_address" => $ip_address, "email" => $session->get("email"), "url" => base_url(uri_string())];

  }
}

  // cheklogin
function checkloginFront()
{
  helper("url");
  $m_user = new User_model();
  $session = \Config\Services::session();
  if ($session->get("email") == "" || $session->get("email") == null) {
    echo "<script>";
    echo 'window.location.href = "' . base_url("login/notif") . '?login=belum";';
    echo "</script>";
  } else {
    //whether ip is from share internet
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
      $ip_address = $_SERVER["HTTP_CLIENT_IP"];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      $ip_address = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    //whether ip is from remote address
    else {
      $ip_address = $_SERVER["REMOTE_ADDR"];
    }

    $data = ["id_user" => $session->get("id_user"), "ip_address" => $ip_address, "email" => $session->get("email"), "url" => base_url(uri_string())];

  }
}





// tanggal_bulan
function tanggal_id($tanggal)
{
  if ($tanggal == "" || $tanggal == null || $tanggal == "0000-00-00" || $tanggal == "1970-01-01") {
    return false;
  } else {
    $hasil = date("d-m-Y", strtotime($tanggal));
    return $hasil;
  }
}

// Tanggal input
function tanggal_input($tanggal)
{
  if ($tanggal == "" || $tanggal == null || $tanggal == "0000-00-00" || $tanggal == "1970-01-01") {
    return false;
  } else {
    $hasil = date("Y-m-d", strtotime($tanggal));
    return $hasil;
  }
}

// Romawi
function romawi($bulan)
{
  if ($bulan == "01") {
    $romawi = "I";
  } elseif ($bulan == "02") {
    $romawi = "II";
  } elseif ($bulan == "03") {
    $romawi = "III";
  } elseif ($bulan == "04") {
    $romawi = "IV";
  } elseif ($bulan == "05") {
    $romawi = "V";
  } elseif ($bulan == "06") {
    $romawi = "VI";
  } elseif ($bulan == "07") {
    $romawi = "VII";
  } elseif ($bulan == "08") {
    $romawi = "VIII";
  } elseif ($bulan == "09") {
    $romawi = "IX";
  } elseif ($bulan == "10") {
    $romawi = "X";
  } elseif ($bulan == "11") {
    $romawi = "XI";
  } elseif ($bulan == "12") {
    $romawi = "XII";
  }
  return $romawi;
}

// Romawi
function bulan($bulan)
{
  if ($bulan == "01") {
    $nama_bulan = "Januari";
  } elseif ($bulan == "02") {
    $nama_bulan = "Februari";
  } elseif ($bulan == "03") {
    $nama_bulan = "Maret";
  } elseif ($bulan == "04") {
    $nama_bulan = "April";
  } elseif ($bulan == "05") {
    $nama_bulan = "Mei";
  } elseif ($bulan == "06") {
    $nama_bulan = "Juni";
  } elseif ($bulan == "07") {
    $nama_bulan = "Juli";
  } elseif ($bulan == "08") {
    $nama_bulan = "Agustus";
  } elseif ($bulan == "09") {
    $nama_bulan = "September";
  } elseif ($bulan == "10") {
    $nama_bulan = "Oktober";
  } elseif ($bulan == "11") {
    $nama_bulan = "November";
  } elseif ($bulan == "12") {
    $nama_bulan = "Desember";
  }
  return $nama_bulan;
}

// Romawi
function hari($tanggal)
{
  $bulan = date("m", strtotime($tanggal));
  $hari = date("l", strtotime($tanggal));

  if ($hari == "Sunday") {
    $nama_hari = "Minggu";
  } elseif ($hari == "Monday") {
    $nama_hari = "Senin";
  } elseif ($hari == "Tuesday") {
    $nama_hari = "Selasa";
  } elseif ($hari == "Wednesday") {
    $nama_hari = "Rabu";
  } elseif ($hari == "Thursday") {
    $nama_hari = "Kamis";
  } elseif ($hari == "Friday") {
    $nama_hari = "Jumat";
  } elseif ($hari == "Saturday") {
    $nama_hari = "Sabtu";
  }

  if ($bulan == "01") {
    $nama_bulan = "Januari";
  } elseif ($bulan == "02") {
    $nama_bulan = "Februari";
  } elseif ($bulan == "03") {
    $nama_bulan = "Maret";
  } elseif ($bulan == "04") {
    $nama_bulan = "April";
  } elseif ($bulan == "05") {
    $nama_bulan = "Mei";
  } elseif ($bulan == "06") {
    $nama_bulan = "Juni";
  } elseif ($bulan == "07") {
    $nama_bulan = "Juli";
  } elseif ($bulan == "08") {
    $nama_bulan = "Agustus";
  } elseif ($bulan == "09") {
    $nama_bulan = "September";
  } elseif ($bulan == "10") {
    $nama_bulan = "Oktober";
  } elseif ($bulan == "11") {
    $nama_bulan = "November";
  } elseif ($bulan == "12") {
    $nama_bulan = "Desember";
  }

  $hasil = $nama_hari . ", " . date("d", strtotime($tanggal)) . " " . $nama_bulan . " " . date("Y", strtotime($tanggal));
  return $hasil;
}

// tanggal_bulan
function tanggal_bulan($tanggal)
{
  $bulan = date("m", strtotime($tanggal));
  $hari = date("l", strtotime($tanggal));

  if ($hari == "Sunday") {
    $nama_hari = "Minggu";
  } elseif ($hari == "Monday") {
    $nama_hari = "Senin";
  } elseif ($hari == "Tuesday") {
    $nama_hari = "Selasa";
  } elseif ($hari == "Wednesday") {
    $nama_hari = "Rabu";
  } elseif ($hari == "Thursday") {
    $nama_hari = "Kamis";
  } elseif ($hari == "Friday") {
    $nama_hari = "Jumat";
  } elseif ($hari == "Saturday") {
    $nama_hari = "Sabtu";
  }

  if ($bulan == "01") {
    $nama_bulan = "Januari";
  } elseif ($bulan == "02") {
    $nama_bulan = "Februari";
  } elseif ($bulan == "03") {
    $nama_bulan = "Maret";
  } elseif ($bulan == "04") {
    $nama_bulan = "April";
  } elseif ($bulan == "05") {
    $nama_bulan = "Mei";
  } elseif ($bulan == "06") {
    $nama_bulan = "Juni";
  } elseif ($bulan == "07") {
    $nama_bulan = "Juli";
  } elseif ($bulan == "08") {
    $nama_bulan = "Agustus";
  } elseif ($bulan == "09") {
    $nama_bulan = "September";
  } elseif ($bulan == "10") {
    $nama_bulan = "Oktober";
  } elseif ($bulan == "11") {
    $nama_bulan = "November";
  } elseif ($bulan == "12") {
    $nama_bulan = "Desember";
  }

  $hasil = date("d", strtotime($tanggal)) . " " . $nama_bulan . " " . date("Y", strtotime($tanggal));
  return $hasil;
}

// tanggal_bulan
function tanggal_bulan_menit($tanggal)
{
  $bulan = date("m", strtotime($tanggal));
  $hari = date("l", strtotime($tanggal));

  if ($hari == "Sunday") {
    $nama_hari = "Minggu";
  } elseif ($hari == "Monday") {
    $nama_hari = "Senin";
  } elseif ($hari == "Tuesday") {
    $nama_hari = "Selasa";
  } elseif ($hari == "Wednesday") {
    $nama_hari = "Rabu";
  } elseif ($hari == "Thursday") {
    $nama_hari = "Kamis";
  } elseif ($hari == "Friday") {
    $nama_hari = "Jumat";
  } elseif ($hari == "Saturday") {
    $nama_hari = "Sabtu";
  }

  if ($bulan == "01") {
    $nama_bulan = "Januari";
  } elseif ($bulan == "02") {
    $nama_bulan = "Februari";
  } elseif ($bulan == "03") {
    $nama_bulan = "Maret";
  } elseif ($bulan == "04") {
    $nama_bulan = "April";
  } elseif ($bulan == "05") {
    $nama_bulan = "Mei";
  } elseif ($bulan == "06") {
    $nama_bulan = "Juni";
  } elseif ($bulan == "07") {
    $nama_bulan = "Juli";
  } elseif ($bulan == "08") {
    $nama_bulan = "Agustus";
  } elseif ($bulan == "09") {
    $nama_bulan = "September";
  } elseif ($bulan == "10") {
    $nama_bulan = "Oktober";
  } elseif ($bulan == "11") {
    $nama_bulan = "November";
  } elseif ($bulan == "12") {
    $nama_bulan = "Desember";
  }

  $hasil = date("d", strtotime($tanggal)) . " " . $nama_bulan . " " . date("Y", strtotime($tanggal)) . " jam " . date("H:i:s", strtotime($tanggal));
  return $hasil;
}

// tanggal_bulan
function tanggal_singkat($tanggal)
{
  $bulan = date("m", strtotime($tanggal));
  $hari = date("l", strtotime($tanggal));

  if ($hari == "Sunday") {
    $nama_hari = "Minggu";
  } elseif ($hari == "Monday") {
    $nama_hari = "Senin";
  } elseif ($hari == "Tuesday") {
    $nama_hari = "Selasa";
  } elseif ($hari == "Wednesday") {
    $nama_hari = "Rabu";
  } elseif ($hari == "Thursday") {
    $nama_hari = "Kamis";
  } elseif ($hari == "Friday") {
    $nama_hari = "Jumat";
  } elseif ($hari == "Saturday") {
    $nama_hari = "Sabtu";
  }

  if ($bulan == "01") {
    $nama_bulan = "Jan";
  } elseif ($bulan == "02") {
    $nama_bulan = "Feb";
  } elseif ($bulan == "03") {
    $nama_bulan = "Mar";
  } elseif ($bulan == "04") {
    $nama_bulan = "Apr";
  } elseif ($bulan == "05") {
    $nama_bulan = "Mei";
  } elseif ($bulan == "06") {
    $nama_bulan = "Jun";
  } elseif ($bulan == "07") {
    $nama_bulan = "Jul";
  } elseif ($bulan == "08") {
    $nama_bulan = "Agus";
  } elseif ($bulan == "09") {
    $nama_bulan = "Sep";
  } elseif ($bulan == "10") {
    $nama_bulan = "Okt";
  } elseif ($bulan == "11") {
    $nama_bulan = "Nov";
  } elseif ($bulan == "12") {
    $nama_bulan = "Des";
  }

  $hasil = date("d", strtotime($tanggal)) . " " . $nama_bulan . " " . date("Y", strtotime($tanggal));
  return $hasil;
}

// Nomor
function angka($angka)
{
  $hasil = number_format($angka, "0", ",", ".");
  return $hasil;
}

// herlper untuk penanggalan
function tgl_indo($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . " " . $bulan . " " . $tahun;
}

function tgl_simpan($tgl)
{
  $tanggal = substr($tgl, 0, 2);
  $bulan = substr($tgl, 3, 2);
  $tahun = substr($tgl, 6, 4);
  return $tahun . "-" . $bulan . "-" . $tanggal;
}

function tgl_view($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = substr($tgl, 5, 2);
  $tahun = substr($tgl, 0, 4);
  return $tanggal . "-" . $bulan . "-" . $tahun;
}

function tgl_grafik($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . "_" . $bulan;
}

function generateRandomString($length = 10)
{
  return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function seo_title($s)
{
  $c = [" "];
  $d = ["-", "/", "\\", ",", ".", "#", ":", ";", '\'', '"', "[", "]", "{", "}", ")", "(", "|", "`", "~", "!", "@", "%", '$', "^", "&", "*", "=", "?", "+", "–"];
  $s = str_replace($d, "", $s); // Hilangkan karakter yang telah disebutkan di array $d
  $s = strtolower(str_replace($c, "-", $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
  return $s;
}

function hari_ini($w)
{
  $seminggu = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
  $hari_ini = $seminggu[$w];
  return $hari_ini;
}

function getBulan($bln)
{
  switch ($bln) {
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

function cek_terakhir($datetime, $full = false)
{
  $today = time();
  $createdday = strtotime($datetime);
  $datediff = abs($today - $createdday);
  $difftext = "";
  $years = floor($datediff / (365 * 60 * 60 * 24));
  $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
  $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
  $hours = floor($datediff / 3600);
  $minutes = floor($datediff / 60);
  $seconds = floor($datediff);
  //year checker
  if ($difftext == "") {
    if ($years > 1) {
      $difftext = $years . " Tahun";
    } elseif ($years == 1) {
      $difftext = $years . " Tahun";
    }
  }
  //month checker
  if ($difftext == "") {
    if ($months > 1) {
      $difftext = $months . " Bulan";
    } elseif ($months == 1) {
      $difftext = $months . " Bulan";
    }
  }
  //month checker
  if ($difftext == "") {
    if ($days > 1) {
      $difftext = $days . " Hari";
    } elseif ($days == 1) {
      $difftext = $days . " Hari";
    }
  }
  //hour checker
  if ($difftext == "") {
    if ($hours > 1) {
      $difftext = $hours . " Jam";
    } elseif ($hours == 1) {
      $difftext = $hours . " Jam";
    }
  }
  //minutes checker
  if ($difftext == "") {
    if ($minutes > 1) {
      $difftext = $minutes . " Menit";
    } elseif ($minutes == 1) {
      $difftext = $minutes . " Menit";
    }
  }
  //seconds checker
  if ($difftext == "") {
    if ($seconds > 1) {
      $difftext = $seconds . " Detik";
    } elseif ($seconds == 1) {
      $difftext = $seconds . " Detik";
    }
  }
  return $difftext;
}

function generatePassword() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }
    
    return $password;
}