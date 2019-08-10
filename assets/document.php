    <?php 
      $no = 1;
    ?>
    <div style="text-align: center">
        <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width: 20%; margin-bottom: 5%" alt="" srcset="">
    </div>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>Document</h1>
        </div>
        <form method="get">
          <input type="date" name="tanggal_filter_mulai" id="">
          <input type="date" name="tanggal_filter_akhir" id="">
          <input type="submit" value="FILTER">
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
                        <?php while($data = mysqli_fetch_array($sql)){?>
                        <tr>
                            <td scope="row"><?php echo $no++;?></td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                            <td>TEST</td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
