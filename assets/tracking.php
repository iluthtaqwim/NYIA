    <?php
      
    ?>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>TRACKING</h1>
        </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="width:10%" data-toggle="modal" data-target="#exampleModal">
  Add Data
</button>
        <div class="card-content table-responsive">
            <table class="table table-striped" >
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Document</th>
                        <th>Nama Kontrak</th>
                        <th>Tanggal Contract</th>
                        <th>Sales</th>
                        <th>Legal</th>
                        <th>Sales</th>
                        <th>Legal</th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>
                                <button type="button"><img src="../assets/img/attach.png" alt="" style="width:20px"></button>
                                <p>27-08-2019</p>
                                <p style="font-size: 12px">INI KETERANGAN</p>
                            </td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                        </tr>
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
      <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="namaMitra" id="" placeholder="Nama Mitra">
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

<?php
  if(isset($_POST['namaMitra'])){
    $r = $_FILES['files'];
    //echo $r;
    if(AddNewNodin($r,$_POST['namaMitra'],$_POST['namaPerjanjian'],$_POST['tanggalKontrak']))echo "susu";

  }
?>