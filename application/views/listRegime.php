<center><h2><?php echo $tab[0][0]['typeregime'];?> :<span><?php echo $tab[0][0]['prixregime'];?>Ar/jours</span></h2></center>
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                <?php for ($i=0;$i<count($tab[0]);$i++) {?>
                <div class="col">
                    <div class="card">
                    <?php $path1 = "assets/img/".$tab[0][$i]['photoplat'];?>
                        <img src="<?php echo base_url($path1)?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tab[0][$i]['nomplat'];?></h5>
                            <b><p class="card-text"><?php echo $tab[0][$i]['nomtypeplat'];?> 
                        </p></b>
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3></h3>
                            <a href="#"><button class="btn btn-primary">Detail</button></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.card-img-top{
    border-radius: 50px;
    padding: 20px;
    height:300px;
}
.card{
    border-radius: 30px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
}
.card-body{
    padding: 25px;
    margin-top: -15px;
}
.btn-primary{
    border-radius: 50px;
    width: 120px;
}
.btn-primary:hover{
    background-color: black;
    border: none;
}
h3,h5{
    color: rgb(0, 91, 228);
}




.filter{
    padding: 20px;
    display: grid;
    grid-template-columns: 22.666% 22.666% 22.666% 22.666%;
    column-gap: 1%;
    row-gap: 10px;
}
.filter .item{
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}
.filter .item select,
.filter .item input,
.filter .item button{
    width: 100%;
    padding: 5px;
    border: none;
    background-color: transparent;
    border-left: 1px solid #ddd;
    outline: none;
}
.filter .item label{
    display: block;
    width: 40%;
    padding: 0 10px;
}
.filter .item.submit button{
    width:300px;
    border-radius:30px;
    background-color: black;
    color: #fff;
}
</style>