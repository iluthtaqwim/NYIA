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
                <table class="table" style ="margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Perusahaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>
                                <div id="rincian">
                                    TOKO BIRU
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-success" disabled type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                                <button class="btn btn-danger" disabled type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    // if(isset($_POST['namaPerusahaan'])){
    //     if() echo "das";
    // }
    //TambahDataPerusahaan("HAKAXI");
?>