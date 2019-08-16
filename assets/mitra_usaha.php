<?php
    modalAddMitra();
                       
function Tabul($t,$idpo){
    $mitra = GetBerkasPerusahaan();
    if($t){
        echo' 

        <div class="card mt-5">
            <div class="card-header" style="text-align: center">
                <h1>MITRA USAHA</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMitra">
                        Tambah Mitra
                </button>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped" style ="margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Perusahaan</th>
                            <th>Jenis Perusahaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $aaa = 0;
                        foreach($mitra as $mitr){
                        $aaa++;
                        $namper = $mitr->NamaPerusahaan();
                        // if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
                        //         $link = "https"; 
                        //     else
                        //         $link = "http"; 
                            
                        //     $link .= "://"; 
                        //     $link .= $_SERVER['HTTP_HOST']; 
                        //  $link .= $_SERVER['REQUEST_URI']; 
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
                        $juju = $mitr->IdKeyPerusahaan();
                        //$nampert = $juju->IsAdaKurangan($mitr);
                        $link ="../assets/index.php?assets=mitra&id_perusahaan=".$juju;
                        echo "
                        <tr>
                            <td scope='row'>$aaa</td>
                            <td>
                                <div class='rincian dropdown dropright' >
                                <i class='fa fa-bell-o' aria-hidden='true'></i>
                                <a class='dropbtn' href='$link'>$namper</a>
                                    <div class='dropdown-content'>
                                        <a href='?assets=document'>Document</a>
                                        <a href='?assets=tracking'>Tracking</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <!-- Default dropright button -->
                                <div class='btn-group dropright'>
                                <button type='button' class='btn btn-secondary dropdown-toggle' id='AdvancedSearch' data-toggle='dropdown'  style='background-color:#718CA1;color:#FFF;' > <span class='selection'>Pilih</span></button>
                                <div class='dropdown-menu' id='dropdown' style='background-color:#718CA1;color:#FFF;'>
                                    <li><a class='dropdown-item' href='#' data-value='F & B'>F & B</a></li>
                                    <li><a class='dropdown-item' href='#' data-value='item2'>ITEM2</a></li>
                                    <li><a class='dropdown-item' href='#' data-value='item3'>ITEM3</a></li>
                                    <li><a class='dropdown-item' href='#' data-value='Cargo'>Cargo</a></li>
                                </div>
                                </div>
                            </td>
                            <td>";
                            
                            if($nampert){
                                echo " <button class='btn btn-success' disabled><i class='fa fa-check' aria-hidden='true'></i></button>";
                            }else {
                                echo "<button class='btn btn-danger' disabled ><i class='fa fa-times' aria-hidden='true'></i></button>";
                            }
                    echo "
                            </td>
                        </tr>";
                        
                    }
                    echo'</tbody>
                </table>
            </div>
        </div>';
    }else{
        $datane;
        foreach($mitra as $mitr){
            if($mitr->IdKeyPerusahaan()==$_GET['id_perusahaan']){
                $datane = $mitr;
            }
        }
        $namper = $datane->NamaPerusahaan();
        $filePerusahanae = $datane->FilePerusahaan();
        echo '  
        <div class="card mt-5">
            <div class="card-header table-striped" style="text-align: center">';
                 echo"<h1>$namper</h1>";
        echo'
            </div>
            <div class="card-body table-responsive">
                <!-- Table mitra usaha -->
        <table class="table ">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Akta</th>
                    <th>TDP</th>
                    <th>SIUP</th> 
                    <th>NPWP</th>
                    <th>SPPKP</th>
                    <th>KTP Direktur</th>
                    <th>Surat Domisili</th>
                </tr>
            </thead>';
            $haha = $datane->fileperushaan;
            echo'
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>';
                    ShowData(1,$haha );
            
            echo'
                    </td>
                    <td>';
                    ShowData(2,$haha );
                    echo'
                    </td>
                    <td>';
                    ShowData(3,$haha );
                    echo'
                    </td>
                    <td>
                    ';
                    ShowData(4,$haha );
                    echo'
                    </td>
                    <td>';
                    ShowData(5,$haha );
                    echo'
                    </td>
                    <td>';
                    ShowData(6,$haha );
                    echo'
                    </td>
                    <td>
                    ';
                    ShowData(7,$haha );
                    echo'
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        </div>
        ';
    }
                      }
                      
                       if(isset($_GET['id_perusahaan'])){
                           Tabul(false,$_GET['id_perusahaan']);
                       }else{
                           Tabul(true,"");
                       }
                      ?>
                     
                <!-- Table keterangan perusahaan -->
    </div>
            <?php tablePerusahaanMitra();?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#rincian').click(function(){
            $('.menu').toggle("slide");  
        }); 
    });

    $(function () {
        $("#dropdown a").click(function () {
            $("#AdvancedSearch .selection").text($(this).text());
    });
});
</script>

<?php 
    if(isset($_POST['namaPerusahaan'])){
        TambahDataPerusahaan($_POST['namaPerusahaan']);
    }
    function MakeInput($na){
        $idperu = $_GET['id_perusahaan'];
        echo"
        <form action='doing.php' method='post' enctype='multipart/form-data'>
        <div>
                            <div class='input-group'>
                                <span class='input-group-text' id=''>Tanggal Kedaluwarsa</span>
                              </div>
                            <input type='date' class='form-control' name='tanggal' id='' >
                            <div class='input-group mb-3'>
                              <div class='custom-file'>
                              <input type='hidden' name='updateBerkas' value='$na'>
                              <input type='hidden' name='idperu' value='$idperu'>
                                <input type='file' accept='application/pdf' class='form-control' name='files' id='file' placeholder='Lampiran'>
                              </div>
                              <div class='input-group-append'>
                                <input type='submit' value ='Submit'<span class='input-group-text' id=''></span>
                              </div>
                              
                            </div>
                            </div>
                            </form>
                            "; 
    }
    function ShowData($ni,$haha){
        $filen = array();
                    foreach($haha as $hu){
                        if($hu->JenisFile()==$ni){
                            $filen[] = $hu;
                        }
                    }
                    if(count($filen)==0){
                            MakeInput($ni);
                    }else{
                        for($a=0;$a<count($filen);$a++){
                            $linkmu = $filen[$a]->link_berkas;
                            $expired = $filen[$a]->expired;
                            $ff = count($filen)-1;
                            if(!$filen[$a]->isExpired()){
                            echo"
                                 <a href=' $linkmu' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> Bisa digunakan - $expired</a></br>
                                ";
                            }else{
                                echo"<a href=' $linkmu' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> Bisa digunakan - $expired</a></br>";
                                if($ff==$a){
                                    echo"Upload Data terbaru</br>";
                                MakeInput($ni);
                                }
                            }
                        }
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