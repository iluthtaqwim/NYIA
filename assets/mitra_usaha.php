<?php
    modalAddMitra();
    

?>
<div>
    <div>
        <div class="card">
            <div class="card-header" style="text-align: center">
                 <h1>MITRA USAHA</h1>
                 <button type="button" class="btn btn-primary" style="width:20%" data-toggle="modal" data-target="#modalMitra">
                    Tambah Mitra
                </button>
            </div>
            <div class="card-body">
                <!-- Table mitra usaha -->
               
                       <?php 
                       
function Tabul($t,$idpo){
    if($t){
        $mitra = GetBerkasPerusahaan();
        echo' <table class="table" style ="margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Perusahaan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>';
        foreach($mitra as $mitr){
            $namper = $mitr->NamaPerusahaan();
            $nampert = false;
            
               echo "
               <tr>
                <td scope='row'>1</td>
                <td>
                    <div class='rincian' data-toggle='modal' data-target='#rincian' >
                    $namper
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
            </table>';
    }else{
        echo '  
        
        ';
    }
                       }
                       Tabul(false,"");
                       
                       ?>
                       
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
                <!-- Table keterangan perusahaan -->
            </div>
            <?php tablePerusahaanMitra();?>
        </div>
    </div>
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