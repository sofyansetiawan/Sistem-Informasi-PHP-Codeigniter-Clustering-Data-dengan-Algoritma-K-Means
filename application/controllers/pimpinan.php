<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	function __construct() {
		parent::__construct();

		if($this->session->userdata('login') != TRUE)
		{
			$this->load->view('pimpinan/error');
		}

		$this->load->model('pimpinanmodel');
		$this->load->model('model');
	}

	function index(){

		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
			$this->load->view('pimpinan/error');

		}
		else {
		
			$this->load->model('model');
			$data = array(
				'title'			=> '.:: Selamat Datang Pimpinan ::. ',
				'nama'			=> $sesinya['nama'],
				'petunjuk'		=> $this->model->getPetunjuk(),
				'wewenang'		=> $this->model->getWewenang(),
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('pimpinan/header',$data);
			$this->load->view('pimpinan/dashboard');
			$this->load->view('pimpinan/footer');

		}
	}


	function cetak_puskesmas(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

			$data_puskesmas = $this->pimpinanmodel->selectdata('data_puskesmas order by no_puskesmas desc')->result_array();

			$data = array(
				'title'			=> '.:: Cetak Data Puskesmas ::. ',
				'nama'			=> $sesinya['nama'],
				'data_puskesmas'		=> $data_puskesmas,
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('pimpinan/header',$data);
			$this->load->view('pimpinan/cetak_puskesmas');
			$this->load->view('pimpinan/footer');

		}	

	}

	function cetak_obat(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

			$data_obat = $this->pimpinanmodel->selectdata('data_obat order by no desc')->result_array();

			$data = array(
				'title'			=> '.:: Cetak Data Obat ::. ',
				'nama'			=> $sesinya['nama'],
				'data_obat'		=> $data_obat,
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('pimpinan/header',$data);
			$this->load->view('pimpinan/cetak_obat');
			$this->load->view('pimpinan/footer');

		}	

	}

	function cetak_penyakit(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

			$data_penyakit = $this->pimpinanmodel->selectdata('data_penyakit LEFT JOIN data_obat on data_penyakit.no=data_obat.no')->result_array();

			$data = array(
				'title'			=> '.:: Cetak Data Obat ::. ',
				'nama'			=> $sesinya['nama'],
				'data_penyakit'		=> $data_penyakit,
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('pimpinan/header',$data);
			$this->load->view('pimpinan/cetak_penyakit');
			$this->load->view('pimpinan/footer');

		}	

	}

	function cetak_penyakit_view(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

		


		$this->load->library('Pdf');

 		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->AddPage();
		$pdf->Image(base_url().'assets/img/logo-SMA.png', 15, 15, 25, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
		$pdf->SetFont('helvetica', 'B', 14);
		$pdf->Write(0, 'SISTEM INFORMASI CERDAS', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'DINAS KESEHATAN', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'KABUPATEN BANDA ACEH', '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', '', 9);
		$pdf->Write(0, 'Jalan Banda Aceh 12'.' Telp. 0341-210-0232', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Email : admin@dinkesbandaaceh.or.id Kode Pos : 65144', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Peringkat Akreditasi : A Nomor : 200/BAP-S/M/TU/XI/2015 Tanggal 22 Desember 2015', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln();

		//header
		$data_penyakit = $this->pimpinanmodel->selectdata('data_penyakit LEFT JOIN data_obat on data_penyakit.no=data_obat.no')->result_array();
		$pdf->SetFont('helvetica', '', 12);

		$tbl_header = '
		<table cellspacing="0" cellpadding="5" border="1">
			<tr>
				<td colspan="2" align="center">LAPORAN DATA PENYAKIT</td>
			</tr>
		</table>';

		$tbl_header .='
		<table border="1" align="center">
		<thead><tr><th>No</th><th>Nama Penyakit</th><th>Nama Obat</th></tr></thead>
        <tbody>';

        $tbl='';

		
	    foreach($data_penyakit as $p)
	    {
	        $tbl .= '<tr><td style="border:1px solid #000;text-align:center">'.$p["no_penyakit"].'</td>'; 
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["nama_penyakit"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["nama_obat"].'</td>    </tr>';
	    }
		
		$tbl_footer = "</table>";


		$pdf->writeHTML($tbl_header.$tbl.$tbl_footer, true, false, false, false, '');
		$pdf->Output('cetak_penyakit.pdf', 'I');

		//pdf
		}	

	}

	function cetak_obat_view(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

		


		$this->load->library('Pdf');

 		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->AddPage();
		$pdf->Image(base_url().'assets/img/logo-SMA.png', 15, 15, 25, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
		$pdf->SetFont('helvetica', 'B', 14);
		$pdf->Write(0, 'SISTEM INFORMASI CERDAS', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'DINAS KESEHATAN', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'KABUPATEN BANDA ACEH', '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', '', 9);
		$pdf->Write(0, 'Jalan Banda Aceh 12'.' Telp. 0341-210-0232', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Email : admin@dinkesbandaaceh.or.id Kode Pos : 65144', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Peringkat Akreditasi : A Nomor : 200/BAP-S/M/TU/XI/2015 Tanggal 22 Desember 2015', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln();

		//header
		$data_obat = $this->pimpinanmodel->selectdata('data_obat order by no desc')->result_array();
		$pdf->SetFont('helvetica', '', 12);

		$tbl_header = '
		<table cellspacing="0" cellpadding="5" border="1">
			<tr>
				<td colspan="2" align="center">LAPORAN DATA OBAT</td>
			</tr>
		</table>';

		$tbl_header .='
		<table border="1" align="center">
		<thead><tr><th>No</th><th>Nama Obat</th><th>Kemasan</th><th>Kebutuhan</th><th>Ketersediaan</th><th>Persen Ketersediaan</th><th>Total Ketersediaan</th></tr></thead>
        <tbody>';

        $tbl='';

		
	    foreach($data_obat as $p)
	    {
	        $tbl .= '<tr><td style="border:1px solid #000;text-align:center">'.$p["no"].'</td>'; 
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["nama_obat"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["kemasan"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["kebutuhan"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["ketersediaan"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["persen_ketersediaan"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$p["total_sedia"].'</td>    </tr>';
	    }
		
		$tbl_footer = "</table>";


		$pdf->writeHTML($tbl_header.$tbl.$tbl_footer, true, false, false, false, '');
		$pdf->Output('cetak_obat.pdf', 'I');

		//pdf
		}	

	}


	function cetak_puskesmas_view(){

		$this->load->library('session');
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '2'){
			
				$this->load->view('pimpinan/error');

		}
		else {

		


		$this->load->library('Pdf');

 		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->AddPage();
		$pdf->Image(base_url().'assets/img/logo-SMA.png', 15, 15, 25, 25, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
		$pdf->SetFont('helvetica', 'B', 14);
		$pdf->Write(0, 'SISTEM INFORMASI CERDAS', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'DINAS KESEHATAN', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'KABUPATEN BANDA ACEH', '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', '', 9);
		$pdf->Write(0, 'Jalan Banda Aceh 12'.' Telp. 0341-210-0232', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Email : admin@dinkesbandaaceh.or.id Kode Pos : 65144', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, 'Peringkat Akreditasi : A Nomor : 200/BAP-S/M/TU/XI/2015 Tanggal 22 Desember 2015', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Ln();

		//header
		$data_puskesmas = $this->pimpinanmodel->selectdata('data_puskesmas order by no_puskesmas desc')->result_array();
		$pdf->SetFont('helvetica', '', 12);

		$tbl_header = '
		<table cellspacing="0" cellpadding="5" border="1">
			<tr>
				<td colspan="2" align="center">LAPORAN DATA PUSKESMAS</td>
			</tr>
		</table>';

		$tbl_header .='
		<table border="1" align="center">
		<thead><tr><th>No</th><th>Nama Puskesmas</th><th>Jumlah Pasien</th><th>Ketersediaan Obat</th><th>Jumlah_fasilitas</th></tr></thead>
        <tbody>';

        $tbl='';

		
	    foreach($data_puskesmas as $pp)
	    {
	        $tbl .= '<tr><td style="border:1px solid #000;text-align:center">'.$pp["no_puskesmas"].'</td>'; 
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$pp["nama_puskesmas"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$pp["jumlah_pasien_total"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$pp["ketersediaan_obat_total"].'</td>';
	        $tbl .= '<td style="border:1px solid #000;text-align:center">'.$pp["jumlah_fasilitas_total"].'</td></tr>';
	    }
		
		$tbl_footer = "</table>";


		$pdf->writeHTML($tbl_header.$tbl.$tbl_footer, true, false, false, false, '');
		$pdf->Output('cetak_puskesmas.pdf', 'I');

		//pdf
		}	

	}




	function logout(){
		$this->session->sess_destroy();
		redirect('');
	}


}