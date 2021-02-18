<div class="jumbotron text-center" style="height:auto;">
  <i class="fa fa-pencil-square-o" style="font-size:30px;color:blue;"></i> <br><br>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/reservation/modify/'.$res['Reservation_ID'];?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Salle</label>
          <div class="col-sm-10">          
           <select name="salleUp" id="" class="form-control">
             <option value="<?php echo $res['id_sal'];?>"><?php echo $res['Nom_Salle'];?></option>
             <?php if(!empty($salles)){ foreach($salles as $sal) { ?>
             <option value="<?php echo $sal['id_salle'];?>"><?php echo $sal['Nom_Salle'];?></option>
             <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Cours</label>
          <div class="col-sm-10">          
          <select name="courUp" id="" class="form-control">
          <option value="<?php echo $res['id_cours'];?>"><?php echo $res['Intitule'];?></option>
           <?php if(!empty($cours)){ foreach($cours as $cour) { ?>
             <option value="<?php echo $cour['Cours_ID'];?>"><?php echo $cour['Intitule'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filiere</label>
          <div class="col-sm-10">          
          <select name="filiereUp" id="" class="form-control">
          <option value="<?php echo $res['id_filiere'];?>"><?php echo $res['Nom_Filiere'];?></option>
           <?php if(!empty($cours)){ foreach($cours as $cr) { ?>
             <option value="<?php echo $cr['FiliereId'];?>"><?php echo $cr['Nom_Filiere'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Enseignant</label>
          <div class="col-sm-10">          
          <select name="enseignantUp" id="" class="form-control">
          <option value="<?php echo $res['id_enseignant'];?>"><?php echo $res['Nom'];?></option>
           <?php if(!empty($ens)){ foreach($ens as $en) { ?>
             <option value="<?php echo $en['Enseignant_ID'];?>"><?php echo $en['Nom'];?></option>
           <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="email" placeholder="Enter date reservation" value="<?php echo set_value('dateresUp',$res['Date_Resa']); ?>" name="dateresUp">
            <?php echo form_error('dateresUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">HeureDebut</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="email" placeholder="Enter Start Hour" value="<?php echo set_value('heuredebutUp',$res['Heure_Debut']); ?>"  name="heuredebutUp">
            <?php echo form_error('heuredebutUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">HeureFin</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="email" placeholder="Enter finish Hour" value="<?php echo set_value('heurefinUp',$res['Heure_Fin']); ?>" name="heurefinUp">
            <?php echo form_error('heurefinUp');?>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </div>
        </div>
    </form>
      </div>
    </div>
</div><br><br><br><br><br><br><br><br>