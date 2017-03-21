<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "halaman_depan";
$route['404_override'] = '';
$route['auth']	= 'halaman_depan/auth';
$route['petunjuk'] =  'halaman_depan/petunjuk';
$route['tentang'] = 'halaman_depan/tentang';

$route['administrasi/dashboard']	= 'administrasi';
$route['administrasi/logout']	= 'administrasi/logout';


$route['administrasi/data_obat']	= 'administrasi/data_obat_view';
$route['administrasi/data_obat/add'] = 'administrasi/data_obat_add';
$route['administrasi/data_obat/save'] = 'administrasi/data_obat_save';
$route['administrasi/data_obat/edit/(:num)'] = 'administrasi/data_obat_edit/$1';
$route['administrasi/data_obat/del/(:num)'] = 'administrasi/data_obat_del/$1';

$route['administrasi/data_penyakit']	= 'administrasi/data_penyakit_view';
$route['administrasi/data_penyakit/add'] = 'administrasi/data_penyakit_add';
$route['administrasi/data_penyakit/save'] = 'administrasi/data_penyakit_save';
$route['administrasi/data_penyakit/edit/(:num)'] = 'administrasi/data_penyakit_edit/$1';
$route['administrasi/data_penyakit/del/(:num)'] = 'administrasi/data_penyakit_del/$1';

$route['administrasi/data_puskesmas']	= 'administrasi/data_puskesmas_view';
$route['administrasi/data_puskesmas/add'] = 'administrasi/data_puskesmas_add';
$route['administrasi/data_puskesmas/save'] = 'administrasi/data_puskesmas_save';
$route['administrasi/data_puskesmas/edit/(:num)'] = 'administrasi/data_puskesmas_edit/$1';
$route['administrasi/data_puskesmas/del/(:num)'] = 'administrasi/data_puskesmas_del/$1';

$route['administrasi/data_tahun']	= 'administrasi/data_tahun_view';
$route['administrasi/data_tahun/add'] = 'administrasi/data_tahun_add';
$route['administrasi/data_tahun/save'] = 'administrasi/data_tahun_save';
$route['administrasi/data_tahun/edit/(:num)'] = 'administrasi/data_tahun_edit/$1';
$route['administrasi/data_tahun/del/(:num)'] = 'administrasi/data_tahun_del/$1';

$route['administrasi/data_fasilitas']	= 'administrasi/data_fasilitas_view';
$route['administrasi/data_fasilitas/add'] = 'administrasi/data_fasilitas_add';
$route['administrasi/data_fasilitas/save'] = 'administrasi/data_fasilitas_save';
$route['administrasi/data_fasilitas/edit/(:num)'] = 'administrasi/data_fasilitas_edit/$1';
$route['administrasi/data_fasilitas/del/(:num)'] = 'administrasi/data_fasilitas_del/$1';

$route['administrasi/data_jumlah_penyakit_puskesmas']	= 'administrasi/data_jumlah_penyakit_puskesmas_view';
$route['administrasi/data_jumlah_penyakit_puskesmas/add'] = 'administrasi/data_jumlah_penyakit_puskesmas_add';
$route['administrasi/data_jumlah_penyakit_puskesmas/save'] = 'administrasi/data_jumlah_penyakit_puskesmas_save';
$route['administrasi/data_jumlah_penyakit_puskesmas/edit/(:num)'] = 'administrasi/data_jumlah_penyakit_puskesmas_edit/$1';
$route['administrasi/data_jumlah_penyakit_puskesmas/del/(:num)'] = 'administrasi/data_jumlah_penyakit_puskesmas_del/$1';

$route['administrasi/data_jumlah_fasilitas_puskesmas']	= 'administrasi/data_jumlah_fasilitas_puskesmas_view';
$route['administrasi/data_jumlah_fasilitas_puskesmas/add'] = 'administrasi/data_jumlah_fasilitas_puskesmas_add';
$route['administrasi/data_jumlah_fasilitas_puskesmas/save'] = 'administrasi/data_jumlah_fasilitas_puskesmas_save';
$route['administrasi/data_jumlah_fasilitas_puskesmas/edit/(:num)'] = 'administrasi/data_jumlah_fasilitas_puskesmas_edit/$1';
$route['administrasi/data_jumlah_fasilitas_puskesmas/del/(:num)'] = 'administrasi/data_jumlah_fasilitas_puskesmas_del/$1';

$route['administrasi/data_jumlah_obat_puskesmas']	= 'administrasi/data_jumlah_obat_puskesmas_view';
$route['administrasi/data_jumlah_obat_puskesmas/add'] = 'administrasi/data_jumlah_obat_puskesmas_add';
$route['administrasi/data_jumlah_obat_puskesmas/save'] = 'administrasi/data_jumlah_obat_puskesmas_save';
$route['administrasi/data_jumlah_obat_puskesmas/edit/(:num)'] = 'administrasi/data_jumlah_obat_puskesmas_edit/$1';
$route['administrasi/data_jumlah_obat_puskesmas/del/(:num)'] = 'administrasi/data_jumlah_obat_puskesmas_del/$1';


$route['pimpinan/dashboard']	= 'pimpinan';
$route['pimpinan/logout']	= 'pimpinan/logout';

$route['pimpinan/cetak_obat']	= 'pimpinan/cetak_obat';
$route['pimpinan/cetak_obat/view']	= 'pimpinan/cetak_obat_view';
$route['pimpinan/cetak_puskesmas']	= 'pimpinan/cetak_puskesmas';
$route['pimpinan/cetak_puskesmas/view']	= 'pimpinan/cetak_puskesmas_view';
$route['pimpinan/cetak_penyakit']	= 'pimpinan/cetak_penyakit';
$route['pimpinan/cetak_penyakit/view']	= 'pimpinan/cetak_penyakit_view';
$route['pimpinan/cetak_penyakit_tahun']	= 'pimpinan/cetak_penyakit_tahun';
$route['pimpinan/cetak_penyakit_tahun/view/(:num)']	= 'pimpinan/cetak_penyakit_tahun/$1';

$route['supplier/dashboard']	= 'supplier';
$route['supplier/generate_awal']	= 'supplier/generate_awal';
$route['supplier/generate_rata']	= 'supplier/generate_rata';
$route['supplier/generate_centroid']	= 'supplier/generate_centroid';
$route['supplier/iterasi_kmeans']	= 'supplier/iterasi_kmeans';
$route['supplier/iterasi_kmeans_lanjut']	= 'supplier/iterasi_kmeans_lanjut';
$route['supplier/iterasi_kmeans_hasil']	= 'supplier/iterasi_kmeans_hasil';

$route['supplier/logout']	= 'supplier/logout';


/* End of file routes.php */
/* Location: ./application/config/routes.php */