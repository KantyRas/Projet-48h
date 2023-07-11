<center>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Codes disponibles</h4>
                <p class="card-description">
                    Etat portefeuille: 
                    <code><?php echo $tab[1][0]['volautilisateur']?> Ar</code>
                  </p>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Numero</th>
                        <th>Montant</th>
                        <th>Etat</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i <count($tab[0]) ; $i++) {?>
                            <tr>
                                <td><?php echo $tab[0][$i]['idcode']?></td>
                                <td><?php echo $tab[0][$i]['numerocode']?></td>
                                <td><?php echo $tab[0][$i]['volacode']?> Ar</td>
                                <?php if($tab[0][$i]['etatcode'] == 0) {?>
                                <td><label class="badge badge-success">Valide</label></td>
                                <?php } else{ ?>
                                    <td><label class="badge badge-danger">Non valide</label></td>
                                <?php }  ?>
                            </tr>
                        <?php }?>
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    </center>
    <br>
    <center>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Achat de code</h4>
                <form action="<?php echo base_url('C_user/getValidationAchatCode')?>" method="post">
                <input type="hidden" name="idclient" value="<?php echo $idutilisateur; ?>">
                <input type="hidden" name="idcode" value="<?php echo $tab[0][0]['idcode']?>">
                <input type="hidden" name="idcompte" value="<?php echo $tab[1][0]['idcompte']?>">
                <div class="form-group">
                    <label>Numero code</label>
                    <input type="text" class="form-control form-control-sm" placeholder="XXX XXX XXX" name="code" aria-label="Username">
                </div>
                <input type="submit" class="btn btn-primary me-2" value="Buy">
                </form>
            </div>
        </div>
    </div>
    </center>
</div>