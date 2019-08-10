<?php 
    function modalRincianMitra(){
        echo '
        <div class="modal" id="modalRincian" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tanggal Berakhir</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="date" name="" id="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
        ';
    }

    function tableHistory($hist,$no){
      echo "
      <tr>
        <td scope='row'>$no</td>
        <td>$hist->username</td>
        <td>$hist->date</td>
        <td>$hist->ket</td>
        <td>$hist->ip</td>
      </tr>
      ";
    }

    function modalAddMitra(){
      echo '
          <div class="modal" id="modalMitra" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post">  
                  <input type="text" style="width: 100%" name="namaPerusahaan" id="" placeholder="Nama Perusahaan">
              </div>
              <div class="modal-footer">
                
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      ';
    }

    function tablePerusahaanMitra(){
      echo '
      
      <div class="modal" id="rincian" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="menu" style="display:none">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Akta</th>
                            <th>TDP</th>
                            <th>SIUP</th> 
                            <th>NPWP</th>
                            <th>SPPKP</th>
                            <th>KTP directur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="../assets/img/attach.png" alt="" style="width:20px"></button></a></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="../assets/img/attach.png" alt="" style="width:20px"></button></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="../assets/img/attach.png" alt="" style="width:20px"></button></td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="../assets/img/attach.png" alt="" style="width:20px"></button></td>
                            <td>(tulisane kurang apik wkwk)</td>
                        </tr>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      
      ';
    }

?>
