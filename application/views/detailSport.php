<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REGIMES</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Genre
                          </th>
                          <th>
                            Activite
                          </th>
                          <th>
                            Type
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
                            <td><?php echo  $d['idgenre'];?></td>
                          <td>
                          <?php echo $d['activite'];?>
                          </td>
                          <td>
                          <?php echo $d['nomtypesport'];?>
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
</div>+