
<head>
<script src="<?php echo base_url().'initial/js/jquery.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
</head>
<div class="jumbotron text-center" id="haut">
<i class="fa fa-book" style="font-size:50px;color:blue"></i> <br><br>
  <h1>Gérez vos differents cours</s></h1>
  <p> vos cours !!!</p> 
  <a href="#form"><button class="btn btn-info"><i class="fa fa-folder"></i> Ajouter un nouveau cours</button></a>
</div>

<form  style="width:50%;margin:auto;">
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
        <th>Intitule</th>
        <th>Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php if(!empty($cours)) { foreach($cours as $cour) {   ?>
          <tr>
            <td><?php echo $cour['Nom_Filiere'];?></td>
            <td><?php echo $cour['Intitule'];?></td>
            <td><?php echo $cour['Description'];?></td>
            <td>
                <a href="<?php echo base_url().'index.php/cours/modify/'.$cour['Cours_ID'];?>" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
            <td>
                <a href="<?php echo base_url().'index.php/cours/supprimer/'.$cour['Cours_ID'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php }}else{ ?>
          <tr>
            <td>Aucun cour</td>
          </tr>
          <?php } ?>
        </tbody>
  </table>
  </div>
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
        </div> <br><br>
        <p class="text-center" style="font-size:22px;font-style:italic;
           text-shadow:5px 5px 10px black;"> 
            Enregistrez vos cours
        </p> 
    <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/cours#myInput';?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filière</label>
          <div class="col-sm-10">          
           <select name="filiereId" id="" class="form-control">
           <?php if(!empty($filieres)){ foreach($filieres as $fil) { ?>
             <option value="<?php echo $fil['Filiere_id'];?>"><?php echo $fil['Nom_Filiere'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">IntituléCours</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="<?php echo set_value('intit'); ?>" placeholder="Enter Course Name"  name="intit" required>
            <?php echo form_error('intit');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">DecriptionCours</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="<?php echo set_value('desc'); ?>" placeholder="Enter Course Description"  name="desc" required>
            <?php echo form_error('desc');?>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
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

