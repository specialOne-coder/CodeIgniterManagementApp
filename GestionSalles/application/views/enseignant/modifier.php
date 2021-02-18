<div class="jumbotron text-center" style="height:auto;">
  <i class="fa fa-pencil-square-o" style="font-size:30px;color:blue;"></i> <br><br>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/enseignant/modify/'.$en['Enseignant_ID'];?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filière</label>
          <div class="col-sm-10">          
           <select name="filiereUp" id="" class="form-control">
             <option value="<?php echo $en['Filiere_id'];?>"><?php echo $en['Nom_Filiere'];?></option>
             <?php if(!empty($filieres)){ foreach($filieres as $fil) { ?>
             <option value="<?php echo $fil['Filiere_id'];?>"><?php echo $fil['Nom_Filiere'];?></option>
             <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Prof Name" value="<?php echo set_value('profNameUp',$en['Nom']); ?>"  name="profNameUp">
            <?php echo form_error('profNameUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Prenom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Cours Description" value="<?php echo set_value('profPrenameUp',$en['Prenom']); ?>"   name="profPrenameUp">
            <?php echo form_error('profPrenameUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Telephone</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="Enter Prof number" value="<?php echo set_value('profNumberUp',$en['Telephone']); ?>"   name="profNumberUp">
            <?php echo form_error('profNumberUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Enter Prof email" value="<?php echo set_value('profEmailUp',$en['Email']); ?>"   name="profEmailUp">
            <?php echo form_error('profEmailUp');?>
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
</div><br><br><br><br><br><br>