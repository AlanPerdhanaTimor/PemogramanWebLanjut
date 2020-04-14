<br><br>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-15">
            <h2>Data Mobil</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>harga</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    for ($i= 0; $i < count( (array) $data_mobil['data']); $i++) { ?>
                    
                    
                    <tr>
                        <td> <?= $i+1 ?></td>
                        <td> <?= $data_mobil['data'][$i]['brgnama'] ?></td>
                        <td> <?= $data_mobil['data'][$i]['brgkatid'] ?></td>
                        <td> <?= $data_mobil['data'][$i]['brgsatid'] ?></td>
                        <td> <?= $data_mobil['data'][$i]['brgstok'] ?></td>
                        <td> <?= $data_mobil['data'][$i]['brghargajual'] ?></td>                       
                    </tr>
                    
                    <?php } ?>
                    
                               
                </tbody>
            </table>
        </div>
    </div>
</div>