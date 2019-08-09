<?php
if (isset($_POST['tampil'])) {
  # code...
  $tahun= $_POST['tahun'];
  $bulan= $_POST['bulan'];
}

$bln = date('m');
$thn = '2017';
$thn_now = date('Y');
?>


    <div style="text-align: center">
        <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width: 20%; margin-bottom: 5%" alt="" srcset="">
    </div>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>Document</h1>
        </div>
        <?php
        $tg= date('Y-m-d');
        ?>
        <form action="" method="">
          <table width="400px" align="right">
            <tr>
              <th>Bulan</th>
              <th>Sampai</th>
              <th></th>
            </tr>
            <tr>
              <th width="20%">
                <div class="input-group mb-3">
                             <select name="bulan" class="form-control select2" style="width: 100%" required="">
                                                  <option value="">Pilih Bulan</option>
                                                    <option value='01'>Januari</option>
                                                    <option value='02'>Februari</option>
                                                    <option value='03'>Maret</option>
                                                    <option value='04'>April</option>
                                                    <option value='05'>Mei</option>
                                                    <option value='06'>Juni</option>
                                                    <option value='07'>Juli</option>
                                                    <option value='08'>Agustus</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
                              </select>
                </div>
              </th>
              <th width="20%">
                <div class="form-group">
                   <select name="tahun" class="form-control select2" style="width: 100%" required="">
                                                <?php for($tahun=date('Y'); $tahun>=2018; $tahun--)
                                                    {
                                                  ?>
                                                  <option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
                                                  <?php } ?>
                                            </select>
                  </div>
              </th>
              <th width="20%">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">FILTER</button>
                </div>
              </th>
            </tr>
          </table>
        </form>
        
       
        
        <div class="card-content">
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Document</th>
                        <th>Nama Kontrak</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
