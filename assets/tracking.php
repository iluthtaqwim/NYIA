    <?php
      $userData = CekUser(GetUsername(),GetPassword());
      modalAlasan();
      $files = GetDataFiles();
      $namedoc = $files->GetNameDoc();
    ?>
    <div class="card mt-5">
        <div class="card-header" style="text-align: center">
            <h1>TRACKING</h1>
            <?php
            if($userData->kat()==2){
                echo'
            <h3>$namedoc</h3
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                Tambah Data
              </button>
              ';
              }
              ?>
        </div>
<!-- Button trigger modal -->

        <div class="card-content table-responsive">
            <table class="table table-striped" >
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Tgl Perjanjian</th>
                        <th>Sales</th>
                        <th>Legal</th>
                        <th>Sales</th>
                        <th>Legal ke Mitra</th>
                        <th>Legal ke Gm</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
    <?php
    if($userData->kat()==1){
   include 'legaltrack.php';
  }else if($userData->kat()==2){
    include 'salestrack.php';
  }
    ?>
</tbody>
            </table>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="doing.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <div class="form-group">
              <label for="sel1">Pilih Mitra Usaha:</label>
              <select class="form-control" name="namaMitra"  id="sel1">
                  <?php
                  $mitra = GetBerkasPerusahaan();
                  foreach($mitra as $mitr){
                        $namper = $mitr->NamaPerusahaan();
                        $fungsi = array();
                        $fungsi[] = ChekDatas(1,$mitr);
                        $fungsi[] = ChekDatas(2,$mitr);
                        $fungsi[] = ChekDatas(3,$mitr);
                        $fungsi[] = ChekDatas(4,$mitr);
                        $fungsi[] = ChekDatas(5,$mitr);
                        $fungsi[] = ChekDatas(6,$mitr);
                        $fungsi[] = ChekDatas(7,$mitr);
                    
                        if (in_array(true, $fungsi)) {
                          $nampert = true;
                        }else {
                          $nampert = false;
                        }
                        if($nampert){
                            echo"<option value='$namper'>$namper</option>";
                        }else{
                            echo"<option value='$namper' disabled>$namper (Periksa Kelengkapan data Mitra)</option>";
                        }
                  }
                  function ChekDatas($jenisfile,$filperus){
                    $kan = $filperus->fileperushaan;
                    $fungsi = array();
                    foreach ($kan as $value) {
                      if($value->JenisFile()==$jenisfile){
                        $fungsi[] = $value->isExpired();
                      }
                    }
                    if (in_array(true, $fungsi)) {
                      return true;
                    }else {
                      return false;
                    }
                  }
                  ?>
              </select>
            </div>
          <br>
          <input type="text" class="form-control" name="namaPerjanjian" id="" placeholder="Nama Perjanjian">
          <br>
          <input type="date" class="form-control" name="tanggalKontrak" id="" placeholder="Tanggal Kontrak">
          <br>
          <input type="file" accept="application/pdf" class="form-control" name="files" id="file" placeholder="Lampiran">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
