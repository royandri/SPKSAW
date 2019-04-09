<?php
class Rangking{

	private $conn;
	private $table_name = "rangking";
	public $nn2;
	public $nn3;
	public $mnr1;
	public $mnr2;
	public $has;

	public function __construct($db){
		$this->conn = $db;
	}

	function readAll(){
		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readKhusus(){
		$query = "SELECT * FROM alternatif a, kriteria b, rangking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readR($a){
		$query = "SELECT * FROM alternatif a, kriteria b, rangking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and c.id_alternatif='$a'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readMax($b){
		$query = "SELECT max(nilai_rangking) as mnr1 FROM " . $this->table_name . " WHERE id_kriteria='$b' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readMin($b){
		$query = "SELECT min(nilai_rangking) as mnr2 FROM " . $this->table_name . " WHERE id_kriteria='$b' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readHasil($a){
		$query = "SELECT sum(bobot_normalisasi) as bbn FROM " . $this->table_name . " WHERE id_alternatif='$a' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}

	function readOne(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_alternatif=? and id_kriteria=? LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->ia = $row['id_alternatif'];
		$this->ik = $row['id_kriteria'];
		$this->nn = $row['nilai_rangking'];
		$this->kk = $row['ket_nilai'];
	}

  function readAllKriteria(){
    $query = "SELECT * FROM kriteria ORDER BY id_kriteria ASC";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    return $stmt;
  }

  function readAllAlternatif(){
    $query = "SELECT * FROM alternatif ORDER BY id_alternatif ASC";
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    return $stmt;
  }

	function normalisasi(){
    $query = "UPDATE
          " . $this->table_name . "
        SET
          nilai_normalisasi = :nn2,
          bobot_normalisasi = :nn3
        WHERE
          id_alternatif = :ia
        AND
          id_kriteria = :ik";
    $stmt = $this->conn->prepare($query);
		$stmt->bindParam(':nn2', $this->nn2);
		$stmt->bindParam(':nn3', $this->nn3);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function hasil(){
    $query = "UPDATE
					" . $this->table_name . "
				SET
					hasil_normalisasi = :has
				WHERE
					id_alternatif = :ia";
    $stmt = $this->conn->prepare($query);
		$stmt->bindParam(':has', $this->has);
		$stmt->bindParam(':ia', $this->ia);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
