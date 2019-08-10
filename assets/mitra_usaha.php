<?php
    modalAddMitra();
    

?>
<div>
    <div>
        
                      <?php 
                       
function Tabul($t,$idpo){
    $mitra = GetBerkasPerusahaan();
    if($t){
        echo' 

 <div class="card">
            <div class="card-header" style="text-align: center">
                 <h1>MITRA USAHA</h1>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMitra">
                Tambah Mitra
            </button>
            <div class="card-body">
<table class="table" style ="margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Perusahaan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>';
            $aaa = 0;
        foreach($mitra as $mitr){
            $aaa++;
            $namper = $mitr->NamaPerusahaan();
            $nampert = false;
            // if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
            //         $link = "https"; 
            //     else
            //         $link = "http"; 
                  
            //     $link .= "://"; 
            //     $link .= $_SERVER['HTTP_HOST']; 
              //  $link .= $_SERVER['REQUEST_URI']; 
            $juju = $mitr->IdKeyPerusahaan();
            $link ="../assets/index.php?assets=mitra&id_perusahaan=".$juju;
              echo "
              <tr>
                <td scope='row'>$aaa</td>
                <td>
                    <div class='rincian' >
                    <a href='$link'>$namper</a>
                    </div>
                </td>
                <td>";
                
                if($nampert){
                    echo " <button class='btn btn-success' disabled type='submit'><i class='fa fa-check' aria-hidden='true'></i></button>";
                }else {
                    echo "<button class='btn btn-danger' disabled type='submit'><i class='fa fa-times' aria-hidden='true'></i></button>";
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
        <div class="card">
            <div class="card-header" style="text-align: center">';
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
                    <th>KTP directur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>
                            <button class="btn btn-primary">
                                <div class="image-upload">
                                    <label for="file-input">
                                        <img width="20px" src="../assets/img/attach.png"/>
                                    </label> 
                                    <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                                </div>
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"  ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>    
                    </td>
                    <td>
                    <button class="btn btn-primary">
                    <div class="image-upload">
                        <label for="file-input">
                            <img width="20px" src="../assets/img/attach.png"/>
                        </label> 
                        <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                    </div>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </td>
                    <td>
                    <button class="btn btn-primary">
                    <div class="image-upload">
                        <label for="file-input">
                            <img width="20px" src="../assets/img/attach.png"/>
                        </label> 
                        <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                    </div>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </td>
                    <td>
                    <button class="btn btn-primary">
                    <div class="image-upload">
                        <label for="file-input">
                            <img width="20px" src="../assets/img/attach.png"/>
                        </label> 
                        <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                    </div>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </td>
                    <td>
                    <button class="btn btn-primary">
                    <div class="image-upload">
                        <label for="file-input">
                            <img width="20px" src="../assets/img/attach.png"/>
                        </label> 
                        <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                    </div>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </td>
                    <td>
                    <button class="btn btn-primary">
                    <div class="image-upload">
                        <label for="file-input">
                            <img width="20px" src="../assets/img/attach.png"/>
                        </label> 
                        <input style="display:none" accept="application/pdf" id="file-input" type="file" />  
                    </div>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
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
</script>

<?php 
    if(isset($_POST['namaPerusahaan'])){
        TambahDataPerusahaan($_POST['namaPerusahaan']);
    }

?>