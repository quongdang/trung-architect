<link type="text/css" rel="stylesheet" href="css/header.css">
<div class="header">
	<div class="logo gradient-text"> Website Administrator </div>
	<div class="userInfor">Welcome <?php echo $_COOKIE['email']?>. </div>	
	<div class="userInfor" onClick="logout()" style="cursor: pointer;">Logout</div>
</div>

<script>
	function logout() {		
		window.open('/admin/admin/logout.php','_self');	
	}
</script>	