<head >
<script src="<?php echo base_url().'initial/js/jquery.js';?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'initial/font-awesome/css/font-awesome.min.css';?>">
</head>

<body>
<div class="jumbotron text-center" id="haut">
<i class="fa fa-calendar" style="font-size:50px;color:blue"></i> <br><br>
  <h1>Reservez vos salles avec efficacité</s></h1>
  <p> vos réservations !!!</p> 
  <a href="#text"><button class="btn btn-info"><i class="fa fa-folder"></i> Faire une nouvelle réservation</button></a>
</div>
<form  style="width:50%;margin:auto;" >
    <div class="input-group">
      <input type="text" id="myInput" class="form-control" placeholder="Search" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" style="height:38px;" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </form> <br><br>
<div class="container">
  <div class="row">

  <table class="table table-hover" id="tab">
    <thead>
      <tr>
        <th>Etage</th>
        <th>Nom-Salle</th>
        <th>Cours</th>
        <th>Filière</th>
        <th>Enseignant</th>
        <th>Date_Reservation</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody id="myTable">
        <?php if(!empty($res)) { foreach($res as $re) {   ?>
          <tr>
            <td><?php echo $re['Etage'];?></td>
            <td><?php echo $re['Nom_Salle'];?></td>
            <td><?php echo $re['Intitule'];?></td>
            <td><?php echo $re['Nom_Filiere'];?></td>
            <td><?php echo $re['Nom'];?></td>
            <td><?php echo $re['Date_Resa'];?></td>
            <td><?php echo $re['Heure_Debut'];?></td>
            <td><?php echo $re['Heure_Fin'];?></td>
            <td>
                <a href="<?php echo base_url().'index.php/reservation/modify/'.$re['Reservation_ID'];?>" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i></a>
            </td>
            <td>
                <a href="<?php echo base_url().'index.php/reservation/supprimer/'.$re['Reservation_ID'];?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
        <?php }}else{ ?>
          <tr>
            <td>Aucune réservation</td>
          </tr>
          <?php } ?>
    </tbody>
  </table> 
  </div><br>
  <button class="btn btn-primary" style="margin:auto;width:10%" id="print" onclick="printContent('tab');"><i class="fa fa-print"></i>  Imprimer</button> <br><br>

  <div class="row">
           <div class="col-md-12">
              <?php
                 $success = $this->session->userdata('success');
                 if($success != ""){
              ?>
                 <script>
                     window.alert("<?php echo $success;  ?>");
                 </script>
              <?php
                 }
              ?>
               <?php
                 $failure = $this->session->userdata('failure');
                 if($failure != ""){
               ?>
                  <script>
                    window.alert("<?php echo $failure;  ?>");
                  </script>
              <?php
                 }
              ?>
           </div>
    </div> <br>
    <p class="text-center" style="font-size:22px;font-style:italic;
      text-shadow:5px 5px 10px black;"  id="text"> 
      Faites une réservation
   </p>
    <form class="form-horizontal" method="post"  action="<?php echo base_url().'index.php/reservation';?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Salle</label>
          <div class="col-sm-10">          
          <select name="salle" id="" class="form-control">
           <?php if(!empty($salles)){ foreach($salles as $sal) { ?>
             <option value="<?php echo $sal['id_salle'];?>"><?php echo $sal['Nom_Salle'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Cours</label>
          <div class="col-sm-10">          
          <select name="cour" id="" class="form-control">
           <?php if(!empty($cours)){ foreach($cours as $cour) { ?>
             <option value="<?php echo $cour['Cours_ID'];?>"><?php echo $cour['Intitule'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filiere</label>
          <div class="col-sm-10">          
          <select name="filiere" id="" class="form-control">
           <?php if(!empty($filieres)){ foreach($filieres as $fil) { ?>
             <option value="<?php echo $fil['Filiere_id'];?>"><?php echo $fil['Nom_Filiere'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Enseignant</label>
          <div class="col-sm-10">          
          <select name="enseignant" id="" class="form-control">
           <?php if(!empty($ens)){ foreach($ens as $en) { ?>
             <option value="<?php echo $en['Enseignant_ID'];?>"><?php echo $en['Nom'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="email" placeholder="Enter date reservation" value="<?php echo set_value('dateres'); ?>" name="dateres" required>
            <?php echo form_error('dateres');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">HeureDebut</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="email" placeholder="Enter Start Hour" value="<?php echo set_value('heuredebut'); ?>"  name="heuredebut" required>
            <?php echo form_error('heuredebut');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">HeureFin</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="email" placeholder="Enter finish Hour" value="<?php echo set_value('heurefin'); ?>" name="heurefin" required>
            <?php echo form_error('heurefin');?>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i> réserver</button>
          </div>
        </div>
    </form>

    <a href="#haut" style="float:right;"><button class="btn btn-danger"><i class="fa fa-hand-o-up"></i></button></a>

</div> <br><br><br><br>

</body>


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

<script>
  function printContent(el){
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
  }
</script>
