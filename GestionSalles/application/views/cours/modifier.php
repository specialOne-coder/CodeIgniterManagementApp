<div class="jumbotron text-center" style="height:auto;">
  <i class="fa fa-pencil-square-o" style="font-size:30px;color:blue;"></i> <br><br>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
      <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/cours/modify/'.$crs['Cours_ID'];?>" id="form" style="width:50%;margin:auto">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Filière</label>
          <div class="col-sm-10">          
           <select name="filiereUp" id="" class="form-control">
             <option value="<?php echo $crs['Filiere_id'];?>"><?php echo $crs['Nom_Filiere'];?></option>
             <?php if(!empty($filieres)){ foreach($filieres as $fil) { ?>
             <option value="<?php echo $fil['Filiere_id'];?>"><?php echo $fil['Nom_Filiere'];?></option>
             <?php }} ?>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">IntituléCours</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="<?php echo set_value('intitUp',$crs['Intitule']); ?>" placeholder="Enter filiere Name"  name="intitUp">
            <?php echo form_error('intit');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">DecriptionCours</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="<?php echo set_value('descUp',$crs['Description']); ?>" placeholder="Enter Cours Description"  name="descUp">
            <?php echo form_error('desc');?>
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
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>