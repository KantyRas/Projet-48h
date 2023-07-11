            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enter your information</h4>
                    <form class="forms-sample" action="<?php echo base_url('C_profil/insert')?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Objectif</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="idobjectif">
                            <?php for ($i=0; $i <count($tab[1]) ; $i++) { ?>
                            <option value="<?php echo $tab[1][$i]['idobjectif'];?>"><?php echo $tab[1][$i]['typeobjectif'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Genre</label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="idgenre">
                        <?php for ($i=0; $i <count($tab[0]) ; $i++) { ?>
                            <option value="<?php echo $tab[0][$i]['idgenre'];?>"><?php echo $tab[0][$i]['typegenre'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Taille</label>
                        <input type="text" class="form-control" placeholder="Enter your height" name="taille">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Poids</label>
                        <input type="text" class="form-control" placeholder="Enter your weight" name="poids">
                    </div>
                    <input type="submit" class="btn btn-primary me-2" value="Submit">
                    <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>