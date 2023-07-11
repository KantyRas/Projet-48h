<center>
<div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Choisir nombre de jours</h4>
                <form action="<?php echo base_url('C_admin/prixRegimeVariantDuree')?>" method="post">
                <div class="form-group">
                    <label>Nombre de jours</label>
                    <input type="text" class="form-control form-control-sm" placeholder="XXX XXX XXX" name="jour" aria-label="Username">
                </div>
                <input type="submit" class="btn btn-primary me-2" value="Voir regime">
                </form>
            </div>
        </div>
    </div>
    </center>
<br>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGIMES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            Prix/jour
                          </th>
                          <th>
                            Objectif
                          </th>
                          <th>
                            
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $d) {?> 
                        <tr>
                          <td class="py-1">
                            <?php echo $d['idregime'];?>
                          </td>
                          <td>
                          <?php echo $d['typeregime'];?>
                          </td>
                          <td>
                          <?php echo $d['prixregime'];?> Ar
                          </td>
                          <td>
                          <?php echo $d['typeobjectif'];?>
                          </td>
                          <td>
                            <a href="#">Modifier</a>
                          </td>
                          <td>
                          <a href="#">Supprimer</a>
                          </td>
                        </tr>
                    <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>