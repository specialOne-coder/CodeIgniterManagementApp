<div class="jumbotron text-center" style="height:auto;">
  <i class="fa fa-pencil-square-o" style="font-size:30px;color:blue;"></i> <br><br>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
    <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/salle/modify/'.$sa['id_salle'];?>" id="form" style="width:50%;margin:auto">
      <div class="form-group">
          <label class="control-label col-sm-2" for="email">Etage</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" placeholder="Enter Salle etage" value="<?php echo set_value('etageUp',$sa['Etage']);?>"  max=5  name="etageUp">
            <?php echo form_error('etageUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" value="<?php echo set_value('nomUp',$sa['Nom_Salle']); ?>" placeholder="Enter Salle Name"  name="nomUp">
            <?php echo form_error('nomUp');?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Capacite</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="email" value="<?php echo set_value('capaciteUp',$sa['Capacite']); ?>" placeholder="Enter Salle Capacity"  name="capaciteUp">
            <?php echo form_error('capaciteUp');?>
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