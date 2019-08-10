  <?php
      $document=GetDataFiles();
   ?>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>Document</h1>
        </div>
        <form action="" method="POST">
          <div class="row" >
              <div class="col-md-4">
                <input type="date" class="form-control" style="width:200px" name="tanggal_filter_mulai" id="">
              </div>
              <div class="col-md-4">
                <input type="date" class="form-control" style="width:200px"  name="tanggal_filter_akhir" id="">
              </div>
              <div class="col-md-4">
                  <button type="submit" class="btn btn-primary" title="filter"><i class="fa fa-search"></i></button>
              </div>
          </div>

        </form>



        <div class="card-content table-responsive">
            <table class="table table-striped ">
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
                        <?php
                          $e=1;
                          foreach ($document as $hise) { ?>
                            <tr>
                              <td scope='row'><?php echo $e ?></td>
                              <td><?php echo TanggalIndo($hise->date); ?></td>
                              <td><?php echo $hise->namedoc ?></td>
                              <td><?php echo $hise->ketdok ?></td>
                              <td>
                                <?php
                                if($hise->status==0) {
                                  echo 'Diajukan';
                                }elseif ($hise->status==1) {
                                  echo "Proses";
                                }elseif ($hise->status==2) {
                                  echo "Ditolak";
                                }
                                 ?>
                              </td>
                              <!-- <td><?php// echo $hise->kontrak ?></td> -->
                            </tr>
                        <?php
                        $e++;
                        }
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
