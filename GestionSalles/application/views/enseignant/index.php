<head>
<script src="<?php echo base_url().'initial/js/jquery.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
</head>
<div class="jumbotron text-center" id="haut">
<i class="fa fa-users" style="font-size:50px;color:blue"></i> <br><br>
  <h1>Gérez vos différents enseignants</s></h1>
  <p> vos enseignants !!!</p> 
  <a href="#text"><button class="btn btn-info"><i class="fa fa-folder"></i> Ajouter un nouveau prof</button></a>
</div>

<form action="" style="width:50%;margin:auto;">
    <div class="input-group">
      <input type="text" class="form-control" id="myInput" placeholder="Search" name="search">
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
        <th>Filiere</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php if(!empty($ens)) { foreach($ens as $en) {   ?>
          <tr>
            <td><?php echo $en['Nom_Filiere'];?></td>
            <td><?php echo $en['Nom'];?></td>
            <td><?php echo $en['Prenom'];?></td>
            <td><?php echo $en['Telephone'];?></td>
            <td><?php echo $en['Email'];?></td>
            <td>
                <a href="<?php echo base_url().'index.php/enseignant/modify/'.$en['Enseignant_ID'];?>" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
            <td>
                <a href="<?php echo base_url().'index.php/enseignant/supprimer/'.$en['Enseignant_ID'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php }}else{ ?>
          <tr>
            <td>Aucun  enseignant</td>
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
           text-shadow:5px 5px 10px black;" id="text"> 
            Enregistrez vos enseignants
        </p>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/enseignant#myInput';?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filière</label>
          <div class="col-sm-10">          
           <select name="filiere" id="" class="form-control">
           <?php if(!empty($filieres)){ foreach($filieres as $fil) { ?>
             <option value="<?php echo $fil['Filiere_id'];?>"><?php echo $fil['Nom_Filiere'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Prof Name" value="<?php echo set_value('profName'); ?>"  name="profName" required>
            <?php echo form_error('profName');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Prenom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Prof Prename" value="<?php echo set_value('profPrename'); ?>"   name="profPrename" required>
            <?php echo form_error('profPrename');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Telephone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Prof number" value="<?php echo set_value('profNumber'); ?>"   name="profNumber" required>
            <?php echo form_error('profNumber');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter Prof email" value="<?php echo set_value('profEmail'); ?>"   name="profEmail" required>
            <?php echo form_error('profEmail');?>
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
