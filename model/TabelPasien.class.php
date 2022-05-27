<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasien_byId($id)
	{
		// Query mysql
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function insertPasien($data)
	{
		$nik = $data['tnik'];
		$nama = $data['tnama'];
		$tempat = $data['ttempat'];
		$tl = $data['ttl'];
		$gender = $data['tgender'];
		$email = $data['temail'];
		$telp = $data['ttelp'];

		// Query mysql
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($id, $data)
	{
		$nik = $data['tnik'];
		$nama = $data['tnama'];
		$tempat = $data['ttempat'];
		$tl = $data['ttl'];
		$gender = $data['tgender'];
		$email = $data['temail'];
		$telp = $data['ttelp'];
		
		// Query mysql
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
