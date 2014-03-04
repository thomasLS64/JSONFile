<?php
/**
**	JSONFile
**	Bibliothèque de gestion de fichier JSON en php
**/
class JSONFile {
/**
**	Gestion fichier complet
**/
    // Création d'un fichier
	function creatFile($f, $content='') {
		if($file = @fopen($f.'.json', "w")) {
			if($content != '') {
				$fileEncode = json_encode($content);
				fwrite($file, $fileEncode);
			}
			fclose($file);
			return true;
		}
		else {
			return false;
		}
	}

	// Supprimer un fichier
	function removeFile($f) {
		if(unlink($f.'.json')) {
			return true;
		}
		else {
			return false;
		}
	}


/**
**	Gestion contenu de fichier
**/
	// Lecture du fichier
	function read($f, $conditions='') {
		if($file = @fopen($f.'.json', "r")) {
			$fileJSON = fgets($file);
			$fileDecode = json_decode($fileJSON, true);
			fclose($file);
			
			$data = $fileDecode;

			if(is_array($conditions)) {
				for($k=0; $k<count($conditions); $k++) {
					$c = explode(' ', $conditions[$k]);
					$data = $this->condition($c, $data);
				}
			}
			else {
				if($conditions != '') {
					$c = explode(' ', $conditions);
					$data = $this->condition($c, $data);
				}
			}

			return $data;
		}
		else {
			return false;
		}
	}

	// Ajout d'élément
	function add($f, $content) {
		$file = $this->read($f);
		$file[] = $content;

		if($this->removeFile($f)) {
			if($this->creatFile($f, $file)) {
				return true;
			}
		}
		return false;
	}

	// Supprimer un élément
	function remove($f, $id) {
		if($file = $this->read($f)) {
			unset($file[$id]);
			if($this->removeFile($f)) {
				if($this->creatFile($f, $file)) {
					return true;
				}
			}
		}
		return false;
	}

	// Modifier un élément
	function modify($f, $idElt, $value) {
		$sauv = array();
		$this->remove($f, $idElt);
		if($modInf = $this->read($f, 'where id < '.$idElt)) {
			foreach($modInf as $id=>$v) {
				$sauv[] = $v;
			}
		}
		$sauv[] = $value;
		if($modSup = $this->read($f, 'where id > '.$idElt)) {
			foreach($modSup as $id=>$v) {
				$sauv[] = $v;
			}
		}

		$this->removeFile($f);
		$this->creatFile($f, $sauv);
	}

	// Condition
	function condition($c, $data) {
		// Condition : where
		if($c[0] === 'where') {
			if($c[1] === 'id') {
				// Egalité
				if($c[2] === '=') {
					if(@$data[$c[3]])
						$data = $data[$c[3]];
					else
						return false;
				}

				// Supérieur ou égale
				if($c[2] === '>=') {
					foreach($data as $id=>$v) {
						if($id < $c[3])
							unset($data[$id]);
					}
				}

				// Inférieur ou égale
				if($c[2] === '<=') {
					foreach($data as $id=>$v) {
						if($id > $c[3])
							unset($data[$id]);
					}
				}

				// Strictement supérieur
				if($c[2] === '>') {
					foreach($data as $id=>$v) {
						if($id <= $c[3])
							unset($data[$id]);
					}
				}

				// Strictement inférieur
				if($c[2] === '<') {
					foreach($data as $id=>$v) {
						if($id >= $c[3])
							unset($data[$id]);
					}
				}
			}
			else {
				if(count($c) > 4) {
					for($i=4; $i<count($c); $i++)
						$c[3] .= ' '.$c[$i];
				}

				// Egalité
				if($c[2] === '=') {
					foreach($data as $id=>$v) {
						if($v[$c[1]] != $c[3])
							unset($data[$id]);
					}
				}

				// Supérieur ou égale
				if($c[2] === '>=') {
					foreach($data as $id=>$v) {
						if($v[$c[1]] < $c[3])
							unset($data[$id]);
					}
				}

				// Inférieur ou égale
				if($c[2] === '<=') {
					foreach($data as $id=>$v) {
						if($v[$c[1]] > $c[3])
							unset($data[$id]);
					}
				}

				// Strictement supérieur
				if($c[2] === '>') {
					foreach($data as $id=>$v) {
						if($v[$c[1]] <= $c[3])
							unset($data[$id]);
					}
				}

				// Strictement inférieur
				if($c[2] === '<') {
					foreach($data as $id=>$v) {
						if($v[$c[1]] >= $c[3])
							unset($data[$id]);
					}
				}
			}
		}
		// Fin condition : where

		// Condition : order
		if($c[0] === 'order') {
			if($c[1] === 'id') {
				if($c[2] === 'DESC') {
					$data = @array_reverse($data, true);
				}
			}
		}
		// Fin condition : order
		
		// Condition : limit
		if($c[0] === 'limit') {
			$place = 0;
			$mark = explode(',', $c[1]);
			$lowerMark = $mark[0];
			$upperMark = $lowerMark+$mark[1];

			foreach($data as $id=>$v) {
				if($place < $lowerMark || $place >= $upperMark)
					unset($data[$id]);
				$place++;
			}
		}
		// Fin condition : limit

		// Condition : join
		if($c[0] === 'join') {
			if($join = $this->read($c[1])) {
				foreach($join as $v) {
					$data[] = $v;
				}
			}
		}
		//Fin condition : join

		return $data;
	}
}
?>