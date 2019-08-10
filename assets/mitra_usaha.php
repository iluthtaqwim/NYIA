<?php
    function mitra(){
        include "../assets/table_perusahaan_mitra.php";
    }
?>
<div>
    <div style="text-align: center">
        <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width: 20%; margin-bottom: 5%" alt="" srcset="">
    </div>
    <div>
        <div class="card">
            <div class="card-header" style="text-align: center">
                <h1>MITRA USAHA</h1>
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
                                <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                                <button class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Table keterangan perusahaan -->
            </div>
            <?php mitra();?>
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