<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Salles</title>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'initial/css/bootstrap.min.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'initial/js/jquery.js';?>">
<link rel="stylesheet" href="<?php echo base_url().'initial/css/main.css';?>">

    
	<style>
	#partielogo{
		width:50%;
		display:block;
		margin-top:auto;
		margin-bottom:auto;
		
	}
	</style>
</head>
<body>
 
 <div class="container-fluid">

 <div class="row">
           <div class="col-md-12">
              <?php
                 $success = $this->session->userdata('success');
                 if($success != ""){
              ?>
                 <script>alert("<?php echo $success; ?>");</script>
              <?php
                 }
              ?>
               <?php
                 $failure = $this->session->userdata('failure');
                 if($failure != ""){
              ?>
                 <script>document.getElementById('id02').style.display='block';</script>
              <?php
                 }
              ?>
           </div>
        </div>
	<div class="row">
	  <div class="col-md-6" id="partieform">
	
			<form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/welcome/connexion'; ?> " name="CreateSalle" id='forms'>
			<div class="avatar">
				<img src="<?php echo base_url().'initial/images/avatar1.png';?>" class="rounded-circle" width="150" height="150"> 
			</div>	<br>
			<div class="form-group">
					<label class="control-label col-sm-2" for="email">Identifiant</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" placeholder="Enter identifiant" value="admin"  name="name" required>
						<?php echo form_error('name');?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-6" for="email">Password</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" placeholder="Enter password" value ="esig"   name="pass" required>
						<?php echo form_error('pass');?>
					</div>
				</div> <br>
				<div class="form-group">        
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">connexion</button>
						<p class="text-center" style="margin-top:15px;color:blue;">Pas d'informations ? demander!</p>
					</div>
				</div>
			</form>
		<div id="demander">
			<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">demander</button>
		</div>
	  </div>
      
	  <div class="col-md-6" id="partielogo">	 
         <img src="<?php echo base_url().'initial/images/insec.png';?>" alt="">
	  </div>

	</div>
</div>

</body>
</html>

<div id="id01" class="modal">
    
    <form class="modal-content animate" >
        <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="email" placeholder="Enter your email" ngModel name="mail" required>
        <button type="submit">Envoyer</button> 
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>    
    </div>
    </form>
</div>

<div id="id02" class="modal">
    
    <form class="modal-content animate" >
        <div class="container">
       	  <div class="alert alert-danger">
        	 <strong>Erreur!</strong> <br> Identifiant ou mot de passe incorrect.
		  </div>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>    
    </div>
    </form>
</div>

<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>