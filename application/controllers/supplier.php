<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct() {
		parent::__construct();

		if($this->session->userdata('login') != TRUE)
		{
			$this->load->view('supplier/error');
		}

		$this->load->model('suppliermodel');
		$this->load->model('model');
	}

	function index(){

		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {
		
			$this->load->model('model');
			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'petunjuk'		=> $this->model->getPetunjuk(),
				'wewenang'		=> $this->model->getWewenang(),
				'titlesistem'	=> $this->model->getTitle(),
			);
			
			$this->load->view('supplier/header',$data);
			$this->load->view('supplier/dashboard');
			$this->load->view('supplier/footer');

		}
	}


	function generate_awal(){

		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {
		
			$this->load->model('model');
			

			$data_puskesmas = $this->suppliermodel->selectdata('data_puskesmas');
			

			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'data_puskesmas'=> $data_puskesmas,
				'titlesistem'	=> $this->model->getTitle(),
			);

			$this->load->view('supplier/header',$data);
			$this->load->view('supplier/generate_awal');
			$this->load->view('supplier/footer');

		}
	}


	function generate_rata(){

		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {
		
		$data_puskesmas = $this->db->get('data_puskesmas');
		$v = "";
		if(count($data_puskesmas->result())<0)
		{
			$nilai = floor(($s->jumlah_pasien_total+$s->ketersediaan_obat_total+$s->jumlah_fasilitas_total)/3);
			$v = "insert into rata_rata (no_puskesmas,rata_rata) values ('".$s->no_puskesmas."','".$nilai."')";
			$this->db->query($v);
		}
		else
		{
			$this->db->query('truncate table rata_rata');
			foreach($data_puskesmas->result() as $s)
			{
				$nilai = floor(($s->jumlah_pasien_total+$s->ketersediaan_obat_total+$s->jumlah_fasilitas_total)/3);
				$v = "insert into rata_rata (no_puskesmas,rata_rata) values ('".$s->no_puskesmas."','".$nilai."')";
				$this->db->query($v);
			}
		}
		
			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
			);


		$data['data_puskesmas'] = $this->db->query('select * from data_puskesmas left join rata_rata on data_puskesmas.no_puskesmas=rata_rata.no_puskesmas');

		$this->load->view('supplier/header',$data);
		$this->load->view('supplier/generate_rata');
		$this->load->view('supplier/footer');
		}
	}


	function generate_centroid(){

		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {

			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
		);
		
		$kluster = 5;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$data['c1'] = rand(81,100);
		$data['c2'] = rand(70,80);
		$data['c3'] = rand(60,69);
		$data['c4'] = rand(40,59);
		$data['c5'] = rand(0,39);
		$data_puskesmas = $this->db->query('select * from data_puskesmas left join rata_rata on data_puskesmas.no_puskesmas=rata_rata.no_puskesmas');
		$st = "";
		
		$this->db->query('truncate table hasil');
		foreach($data_puskesmas->result() as $s)
		{
			$d1 = abs($s->rata_rata-$data['c1']); //96-90 = 6
			$d2 = abs($s->rata_rata-$data['c2']); // 78 - 75 = 3
			$d3 = abs($s->rata_rata-$data['c3']);
			$d4 = abs($s->rata_rata-$data['c4']);
			$d5 = abs($s->rata_rata-$data['c5']);
			
			$array_sort_awal = array($d1,$d2,$d3,$d4,$d5);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){//1 4 --> 2
				for ($k=0;$k<=$kluster-2;$k++) {//0 2 --> 1
					if ($array_sort[$k] > $array_sort[$k + 1]){ // $array_sort[0] > $array_sort[1] --> 6 > 3
						$temp = $array_sort[$k]; // 3
						$array_sort[$k] = $array_sort[$k + 1]; // 4
						$array_sort[$k + 1] = $temp; //$array_sort[1] = 4
					}
				}
			}
			
			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0]==$array_sort_awal[$r])
					{
						if($r==0) $st =  "Sangat Baik";
						else if($r==1) $st =  "Baik";
						else if($r==2) $st =  "Cukup";
						else if($r==3) $st =  "Kurang";
						else if($r==4) $st =  "Kurang Sekali";
					}
				}
			}
			$this->db->query("insert into hasil (no_puskesmas,predikat,d1,d2,d3,d4,d5) values('".$s->no_puskesmas."','".$st."','".$d1."','".$d2."','".$d3."','".$d4."','".$d5."')");
		}

		

		$data['data_puskesmas'] = $this->db->query("select * from data_puskesmas left join (rata_rata,hasil) on data_puskesmas.no_puskesmas=rata_rata.no_puskesmas and data_puskesmas.no_puskesmas=hasil.no_puskesmas");

		$this->load->view('supplier/header',$data);
		$this->load->view('supplier/generate_centroid');
		$this->load->view('supplier/footer');
		}
	}

	function iterasi_kmeans(){
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {
			$this->load->model('model');
			

			$data_puskesmas = $this->suppliermodel->selectdata('data_puskesmas');
			

			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'data_puskesmas'=> $data_puskesmas,
				'titlesistem'	=> $this->model->getTitle(),
			);

			$this->load->view('supplier/header',$data);
			$this->load->view('supplier/iterasi_kmeans');
			$this->load->view('supplier/footer');
		}
	}



	function iterasi_kmeans_lanjut(){
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {
		$data = array(
			'title'			=> '.:: Selamat Datang Supplier ::. ',
			'nama'			=> $sesinya['nama'],
			'titlesistem'	=> $this->model->getTitle(),
		);
			
		$data['data_puskesmas'] = $this->db->get('data_puskesmas');
		$id = "";
		$id = $this->db->query('select max(nomor) as m from hasil_centroid');
		foreach($id->result() as $i)
		{
			$id = $i->m;
		}
		$this->db->where('nomor', $id);
		$data['centroid'] = $this->db->get('hasil_centroid');
		$data['id'] = $id+1;
		
		$it = "";
		$it = $this->db->query('select max(iterasi) as it from centroid_temp');
		foreach($it->result() as $i)
		{
			$it = $i->it;
		}
		
		$it_temp = $it-1;
		$this->db->where('iterasi', $it_temp);
		$it_sebelum = $this->db->get('centroid_temp');
		$c1_sebelum = array();
		$c2_sebelum = array();
		$c2_sebelum = array();
		$no=0;
		foreach($it_sebelum->result() as $it_prev)
		{
			$c1_sebelum[$no] = $it_prev->c1;
			$c2_sebelum[$no] = $it_prev->c2;
			$c3_sebelum[$no] = $it_prev->c3;
			$no++;
		}
		
		$this->db->where('iterasi', $it);
		$it_sesesudah = $this->db->get('centroid_temp');
		$c1_sesesudah = array();
		$c2_sesesudah = array();
		$c2_sesesudah = array();
		$no=0;
		foreach($it_sesesudah->result() as $it_next)
		{
			$c1_sesesudah[$no] = $it_next->c1;
			$c2_sesesudah[$no] = $it_next->c2;
			$c3_sesesudah[$no] = $it_next->c3;
			$no++;
		}
		
		if($c1_sebelum==$c1_sesesudah || $c2_sebelum==$c2_sesesudah || $c2_sebelum==$c2_sesesudah)
		{
			?>
				<script>
					alert("Proses iterasi berakhir pada tahap ke-<?php echo $it; ?>");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."supplier/iterasi_kmeans_hasil'>";
		}
		else
		{
			$this->load->view('supplier/header',$data);
			$this->load->view('supplier/iterasi_kmeans_lanjut');
			$this->load->view('supplier/footer');
		}
		}
	}	

	

	function iterasi_kmeans_hasil(){
		$sesinya	= $this->session->userdata('login');
		if($sesinya['level'] != '3'){
			
			$this->load->view('supplier/error');

		}
		else {

			$data_hasil = $this->suppliermodel->selectdata('hasil INNER JOIN data_puskesmas on hasil.no_puskesmas = data_puskesmas.no_puskesmas order by d5 DESC');

			$data = array(
				'title'			=> '.:: Selamat Datang Supplier ::. ',
				'nama'			=> $sesinya['nama'],
				'titlesistem'	=> $this->model->getTitle(),
				'data_hasil'	=> $data_hasil,
			);

			$data['q'] = $this->db->query('select * from centroid_temp group by iterasi');

			$this->load->view('supplier/header',$data);
			$this->load->view('supplier/iterasi_kmeans_hasil');
			$this->load->view('supplier/footer');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('');
	}


}