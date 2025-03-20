<?php 
$session = \Config\Services::session();
if($session->get('email')=="") {
	$session->setFlashdata('sukses','Ooops... Anda belum login');
	return redirect()->to(base_url('adminlogin'));
}
// gabungkan semua bagian file
require_once('head.php');
require_once('sidebar.php');
require_once('main-panel.php');
require_once('content.php');
require_once('footer.php');
