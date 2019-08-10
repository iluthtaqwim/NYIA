    <?php
      modalAlasan();
    ?>
    <div class="card mt-5">
        <div class="card-header" style="text-align: center">
            <h1>TRACKING</h1>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                Tambah Data
              </button>
        </div>
<!-- Button trigger modal -->

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
                        <?php
                        $files = GetDataFiles();
                        $a=0;
                        foreach($files as $file){
                            $a++;
                            $ket_kont = $file->GetKeteranganDoc();
                            $namedoc = $file->GetNameDoc();
                            $takon = $file->GetTanggalKontrak();
                        echo "
                        <tr>
                            <td scope='row'>$a</td>
                            <td>$namedoc</td>
                            <td>$ket_kont</td>
                            <td>$takon</td>
                            <td>";
                            $link_data = $file->GetListData();
                            $message_data = $file->GetMessage();
                            $total_message = count($message_data);
                            $alink = 0;
                            foreach($link_data as $link){
                                $alink++;
                                $link_datas = $link->GetLink();
                                $linkUpload = $link->GetDate();
                            echo"
                                <a href='$link_datas' id='bottle' ><button class='btn btn-danger'><i class='fa fa-times' ></i></i></button></a>
                                <p>$linkUpload</p>";
                                if($total_message>=$alink){
                                 $ruru = $alink-1;
                                 $value = $message_data[$ruru]->Value();
                                 echo"
                                    <p style='font-size: 12px'>$value</p>";
                                }
                            }
                            $con_stat = $file->GetStatus();
                            if($con_stat==1){
                               echo"
                                <p>Input Baru</p>
                                ";
                            }
                            
                            
                            echo "
                            </td>
                            <td>";
            
                            foreach($link_data as $link){
                                $link_datass = $link->GetLink();
                                 echo"
                                 <a href='$link_datass' id='bottle' ><button class='btn btn-success'><i class='fa fa-check' aria-hidden='true'></i></button></a>
                                ";
                            }
                            echo" <button class='btn btn-danger' data-toggle='modal' data-target='#alasan'><i class='fa fa-times'></i></button>";
                            if($con_stat==0){
                            echo"
                                <p>Setujukah anda?</p>
                                ";
                            }else if($con_stat==1){
                               echo"
                                <p>Anda Menolak</p>
                                ";
                            }else if($con_stat==2){
                               echo"
                                <p>Terverivikasi</p>
                                ";
                            }
                                
                                echo"
                                </td>
                            <td>Wait</td>
                            <td>Wait</td>
                        </tr>
                        ";
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
    if(AddNewNodin($r,$_POST['namaMitra'],$_POST['namaPerjanjian'],$_POST['tanggalKontrak']));

  }
?>