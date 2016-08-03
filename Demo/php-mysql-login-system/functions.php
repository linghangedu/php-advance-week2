<?php
	function logged_in () {
		if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
			return true;
		} else {
			return false;
		}
	}
	
	function redirect_to ($url) {
        echo "<script>window.location='{$url}'</script>";
	}
?>