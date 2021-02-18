<div class="jumbotron text-center" style="height:auto;">
  <i class="fa fa-pencil-square-o" style="font-size:30px;color:blue;"></i> <br><br>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-8" style="margin:auto;">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/filiere/modify/'.$fili['Filiere_id']; ?>" name="UpdateFiliere" id='formf' style="width:50%;margin:auto">
                <div class="form-group">
                <label class="control-label col-sm-2" for="nomfil">NomFilière</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomfil" value="<?php echo set_value('updateFil',$fili['Nom_Filiere']);?>" placeholder="Enter filiere Name"  name="updateFil">
                    <?php echo form_error('updateFil');?>
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