<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Notifications</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nº client
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prénom
                          </th>
                          <th>
                            Nº code
                          </th>
                          <th>
                            Montant
                          </th>
                          <th>
                            Nº compte
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
                            <?php echo $d['idvalidation'];?>
                          </td>
                          <td>
                          <?php echo $d['idutilisateur'];?>
                          </td>
                          <td>
                          <?php echo $d['nom'];?>
                          </td>
                          <td>
                          <?php echo $d['prenom'];?>
                          </td>
                          <td>
                          <?php echo $d['numerocode'];?>
                          </td>
                          <td>
                          <?php echo $d['volacode'];?>
                          </td>
                          <td>
                          <?php echo $d['idcompte'];?>
                          </td>
                          <?php $str = 'C_admin/jeValide/'.$d['idcode'].'/'.$d['idcompte'].'/'.$d['volacode'].'/'.$d['idutilisateur'].'/'.$d['idvalidation']; ?>
                          <td>
                            <a href="<?php echo base_url($str); ?>">Valider</a>
                          </td>
                          <?php $str1 = 'C_admin/jeRefuse/'.$d['idvalidation']; ?>
                          <td>
                          <a href="<?php echo base_url($str1); ?>">Refuser</a>
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