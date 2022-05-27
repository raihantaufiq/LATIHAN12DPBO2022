<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class FormPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function FormPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tambahPasien($new_pasien)
	{
		$this->prosespasien->tambahDataPasien($new_pasien);
	}

	function hapusPasien($id)
	{
		$this->prosespasien->hapusDataPasien($id);
	}

	function ubahPasien($id, $datapasien)
	{
		$this->prosespasien->ubahDataPasien($id, $datapasien);
	}


	function tampil()
	{
		$data = "";
		$data_form_action = "form_pasien.php";
		$data_tombol = '<input type="submit" value="submit" name="submit" class="btn btn-primary">';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode DATA_
		$this->tpl->replace("DATA_FORM_ACTION", $data_form_action);
		$this->tpl->replace("DATA_NIK", $data);
        $this->tpl->replace("DATA_NAMA", $data);
        $this->tpl->replace("DATA_TEMPAT", $data);
        $this->tpl->replace("DATA_TL", $data);
        $this->tpl->replace("DATA_GENDER_CHK_LK", $data);
        $this->tpl->replace("DATA_GENDER_CHK_PR", $data);
        $this->tpl->replace("DATA_EMAIL", $data);
        $this->tpl->replace("DATA_TELP", $data);
		$this->tpl->replace("DATA_TOMBOL", $data_tombol);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampil_edit($id)
	{
		$this->prosespasien->prosesDataPasien_byId($id);
		$data = "";
		$data_form_action = "form_pasien.php?id_ubah=".$this->prosespasien->getId(0);
		$data_tombol = '<input type="submit" value="update" name="update" class="btn btn-success">';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");
		
		// Mengganti kode DATA_
		$this->tpl->replace("DATA_FORM_ACTION", $data_form_action);
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl(0));
		if ($this->prosespasien->getGender(0) == "Laki-laki") {
			$this->tpl->replace("DATA_GENDER_CHK_LK", "checked");
		}elseif ($this->prosespasien->getGender(0) == "Perempuan") {
			$this->tpl->replace("DATA_GENDER_CHK_PR", "checked");
		}
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTelepon(0));
		$this->tpl->replace("DATA_TOMBOL", $data_tombol);

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
