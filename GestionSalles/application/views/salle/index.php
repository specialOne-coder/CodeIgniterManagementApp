<head>
<script src="<?php echo base_url().'initial/js/jquery.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
</head>
<div class="jumbotron text-center" id="haut">
<i class="fa fa-bank" style="font-size:50px;color:blue"></i> <br><br>
  <h1>Gérez vos différentes Salles</s></h1>
  <p> vos salles !!!</p> 
  <a href="#forms"><button class="btn btn-info"><i class="fa fa-folder"></i> Ajouter une nouvelle salle</button></a>
</div>

<form style="width:50%;margin:auto;">
    <div class="input-group">
      <input type="text" id="myInput" class="form-control" placeholder="Search" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" style="height:38px;" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form> <br><br>
<div class="container">
  <div class="row">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Etage</th>
        <th>Nom-Salle</th>
        <th>Capacité</th>
        <th></th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php if(!empty($salles)) {
                foreach($salles as $salle) {   ?>
          <tr>
            <td><?php echo $salle['Etage'];?></td>
            <td><?php echo $salle['Nom_Salle'];?></td>
            <td><?php echo $salle['Capacite'];?></td>
            <?php if($salle['réservé'] == 0) {   ?>
              <td><span class="badge badge-danger">non-réservé</span></td>
            <?php }else{ ?>
              <td><span class="badge badge-success">réservé</span></td>
            <?php } ?>
            <td>
                <a href="<?php echo base_url().'index.php/salle/modify/'.$salle['id_salle'];?>" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
            <td>
                <a href="<?php echo base_url().'index.php/salle/supprimer/'.$salle['id_salle'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php }
            
            
            }else{ ?>
          <tr>
            <td>Aucune filière</td>
          </tr>
          <?php } ?>
    </tbody>
  </table>
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
                 <script>alert("<?php echo $failure; ?>");</script>
              <?php
                 }
              ?>
           </div>
        </div>
        <p class="text-center" style="font-size:22px;font-style:italic;
           text-shadow:5px 5px 10px black;"> 
            Enregistrez vos salles
        </p>
  <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/salle#myInput'; ?> " name="CreateSalle" id='forms' style="width:50%;margin:auto">
       <div class="form-group">
          <label class="control-label col-sm-2" for="email">Etage</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" placeholder="Enter Salle etage" value="<?php echo set_value('etage');?>"  max=5  name="etage" required>
            <?php echo form_error('etage');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Salle Name"  value="<?php echo set_value('nom');?>"   name="nom" required>
            <?php echo form_error('nom');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Capacité</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" placeholder="Enter Salle capacity" value="<?php echo set_value('capacite');?>"  name="capacite" required>
            <?php echo form_error('capacite');?>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Enrégistrer</button>
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
