<?php
	class ModalBuild {
		private function connect() {
			return new mysqli($conf['sql']['host'], $conf['sql']['user'], $conf['sql']['pass'], $conf['sql']['name']);
		}
		public function query($query) {
	      $db = $this->connect();

	      $result = $db->query($query);
	      if(!$result) {
	        echo "False";
	      }
	      while ($row = $result->fetch_array() ) {
	        $results[] = $row;
	      }
	      $result->free();
	      $db->close();
	      return $results;
	    }
		function getAdditionalInfo($title) {
	      $sql = "SELECT addition_info FROM sub_category WHERE sub_cat = '$title' LIMIT 1";
	      $result = $this->query($sql);
		      return $result;
	    }
	}
	$mb = new ModalBuild();
	$modal_title = $_POST['title'];
	$add_info = $mb->getAdditionalInfo($modal_title)[0][0];
	echo $add_info;
 ?>
