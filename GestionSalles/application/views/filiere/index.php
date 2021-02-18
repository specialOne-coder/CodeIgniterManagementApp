
<head>
<script src="<?php echo base_url().'initial/js/jquery.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
</head>
<div class="jumbotron text-center"id="haut">
<i class="fa fa-cloud" style="font-size:50px;color:blue"></i> <br><br>
  <h1>Gérer vos différentes filières</s></h1>
  <p> vos filières !!!</p> 
  <a href="#formf"><button class="btn btn-info"><i class="fa fa-folder"></i> Ajouter une nouvelle filière</button></a>
</div>
<form style="width:50%;margin:auto;">
    <div class="input-group">
      <input type="text" class="form-control" id="myInput" placeholder="Search" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" style="height:38px;" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form> <br><br>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom-Filière</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody id="myTable">
        <?php if(!empty($filieres)) { foreach($filieres as $fil) {   ?>
          <tr>
            <td><?php echo $fil['Nom_Filiere'];?></td>
            <td>
                <a href="<?php echo base_url().'index.php/filiere/modify/'.$fil['Filiere_id'];?>" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
            <td>
                <a href="<?php echo base_url().'index.php/filiere/supprimer/'.$fil['Filiere_id'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php }}else{ ?>
          <tr>
            <td>Aucune filière</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
      </div> <br><br>

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
                 <div class="alert alert-success"><?php echo $failure; ?></div>
              <?php
                 }
              ?>
           </div>
        </div>

        <p class="text-center" style="font-size:22px;font-style:italic;
          text-shadow:5px 5px 10px black;"> 
          Enrégistrer vos filières
       </p>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/filiere#myInput'; ?> " name="CreateFiliere" id='formf' style="width:50%;margin:auto">
            <div class="form-group">
              <label class="control-label col-sm-2" for="nomfil">NomFilière</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nomfil" value="<?php echo set_value('filierename');?>" placeholder="Enter filiere Name"  name="filierename" required>
                <?php echo form_error('filierename');?>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="fa fa-cloud"></i> enregistrer</button>
              </div>
            </div>
        </form>
        <a href="#haut" style="float:right;"><button class="btn btn-danger"><i class="fa fa-hand-o-up"></i></button></a>
       

</div> <br><br><br><br>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
