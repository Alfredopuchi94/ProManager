<nav class="navbar navbar-info bg-info navbar-expand-lg justify-content-between">
  <a class="navbar-brand" href="/">ProManager</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">
			<form class="form-inline">
				<?php if ($status) { ?>
					<div class="input-group">
						<input type="text" value="Hi <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" class="form-control text-center" readonly>
			      <span class="input-group-btn">
			        <a href="./logout.php" class="btn btn-outline-danger">Log Out</a>
			      </span>
			    </div>
				<?php } ?>
			</form>
    	</ul>
  </div>
</nav><br>
