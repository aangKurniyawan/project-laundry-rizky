<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Homepage_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*LOGIN ROUTE */
$route['login'] = 'Login_controller/index';
$route['auth'] = 'Login_controller/auth';
$route['logout'] = 'Login_controller/logout';
$route['authmember'] = 'Login_controller/auth_member';
$route['logoutmember'] = 'Login_controller/logout_member';
/*LOGIN ROUTE*/ 

/*HOMEPAGE ROUTE*/ 
$route['homepage'] = 'Homepage_controller/index';
$route['produk'] = 'Homepage_controller/menu_produk';
$route['detailproduk/:any'] = 'Homepage_controller/detail_produk';
$route['kontak'] = 'Homepage_controller/menu_kontak';
$route['daftar'] = 'Homepage_controller/menu_daftar_member';
$route['insertmember'] = 'Homepage_controller/insert_member';
$route['formloginmember'] = 'Homepage_controller/form_login_member';
$route['transaksimember'] = 'Homepage_controller/transaksi_member';
$route['forminserttransaksimember/:any'] = 'Homepage_controller/form_insert_transaksi_member';
$route['inserttransaksipelanggan'] = 'Homepage_controller/insert_transaksi_member_homepage';
$route['detailtransaksimember/:any'] = 'Homepage_controller/detail_transaksi_member';
/*HOMEPAGE ROUTE*/

/* DASHBOARD */
$route['dashboard'] = 'Dashboard_controller/index';
$route['masterowner'] = 'Dashboard_controller/master_owner';
$route['formaddowner'] = 'Dashboard_controller/form_tambah_owner';
$route['insertowner'] = 'Dashboard_controller/insert_owner';
$route['formeditowner/:any'] = 'Dashboard_controller/form_edit_owner';
$route['updateowner'] = 'Dashboard_controller/update_owner';
$route['hapusowner'] = 'Dashboard_controller/hapus_owner';
$route['masterstaf'] = 'Dashboard_controller/master_staf';
$route['formaddstaf'] = 'Dashboard_controller/form_tambah_staf';
$route['insertstaf'] = 'Dashboard_controller/insert_staf';
$route['formeditstaf/:any'] = 'Dashboard_controller/form_edit_staf';
$route['updatestaf'] = 'Dashboard_controller/update_staf';
$route['hapusstaf'] = 'Dashboard_controller/hapus_staf';
$route['masterpelanggan'] = 'Dashboard_controller/master_pelanggan';
$route['formaddpelanggan'] = 'Dashboard_controller/form_tambah_pelanggan';
$route['insertpelanggan'] = 'Dashboard_controller/insert_pelanggan';
$route['formeditpelanggan/:any'] = 'Dashboard_controller/form_edit_pelanggan';
$route['updatepelanggan'] = 'Dashboard_controller/update_pelanggan';
$route['hapuspelanggan'] = 'Dashboard_controller/hapus_pelanggan';
$route['masterjenislaundry'] = 'Dashboard_controller/master_jenis_laundry';
$route['formaddjenislaundry'] = 'Dashboard_controller/form_tambah_jenis_laundry';
$route['insertjenislaundry'] = 'Dashboard_controller/insert_jenis_laundry';
$route['formeditjenislaundry/:any'] = 'Dashboard_controller/form_edit_jenis_laundry';
$route['updatejenislaundry'] = 'Dashboard_controller/update_jenis_laundry';
$route['hapusjenislaundry'] = 'Dashboard_controller/hapus_jenis_laundry';
$route['masterjenisbayar'] = 'Dashboard_controller/master_jenis_bayar';
$route['formaddjenisbayar'] = 'Dashboard_controller/form_tambah_jenis_bayar';
$route['insertjenisbayar'] = 'Dashboard_controller/insert_jenis_bayar';
$route['formeditjenisbayar/:any'] = 'Dashboard_controller/form_edit_jenis_bayar';
$route['updatejenisbayar'] = 'Dashboard_controller/update_jenis_bayar';
$route['hapusjenisbayar'] = 'Dashboard_controller/hapus_jenis_bayar';
$route['transaksi'] = 'Dashboard_controller/transaksi_laundry';
$route['formaddtransaksi'] = 'Dashboard_controller/form_tambah_transaksi';
$route['inserttransaksinonmember'] = 'Dashboard_controller/insert_transaksi_non_member';
$route['inserttransaksimember'] = 'Dashboard_controller/insert_transaksi_member';
$route['frombayartransaksi/:any'] = 'Dashboard_controller/form_bayar_transaksi';
$route['prosesbayar'] = 'Dashboard_controller/proses_bayar_transaksi';
$route['formedittransaksi/:any'] = 'Dashboard_controller/form_edit_transaksi';
$route['updatetransaksinonmember'] = 'Dashboard_controller/update_transaksi';
$route['bataltransaksi'] = 'Dashboard_controller/batal_transaksi';
$route['laporantransaksi'] = 'Dashboard_controller/laporan_transaksi';
$route['carilaporantransaksi'] = 'Dashboard_controller/cari_laporan_transaksi';
$route['laporanpembayaran'] = 'Dashboard_controller/laporan_pembayaran';
$route['carilaporanpembayaran'] = 'Dashboard_controller/cari_laporan_pembayaran';