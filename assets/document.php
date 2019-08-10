  <?php
      $document=GetDataFiles();

   ?>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>Document</h1>
        </div>
        <form action="" method="POST" >
          <?php
           $cek=date('Y-m-d');
          ?>
          <div class="row" >
              <div class="col-md-4">
                <input type="date" class="form-control" style="width:200px" name="m" id="a" required value="<?php echo $_POST['m']; ?>">
              </div>
              <div class="col-md-4">
                <input type="date" class="form-control" style="width:200px"  name="s" id="b" required   value="<?php echo $_POST['s']; ?>">
              </div>
              <div class="col-md-4">
                  <button type="submit" name="filter" class="btn btn-primary" title="filter"><i class="fa fa-search"></i></button>
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
                      <?php if (!empty($_POST['m'])){ ?>
                        <?php
                          $e=1;
                          foreach ($document as $hise) {
                            $m =$_POST['m'];
                            $s =$_POST['s'];
                              $tgl=$hise->tgl_contract;
                              if ($m<=$tgl && $tgl <= $s) {

                            ?>

                            <tr>
                              <td scope='row'><?php echo $e ?></td>
                              <td><?php echo TanggalIndo($hise->tgl_contract); ?></td>
                              <td><?php echo $hise->namedoc ?></td>
                              <td><?php echo $hise->ketdok ?></td>
                              <td>
                                <?php
                                if($hise->status==0) {
                                  echo '<b style="color:orange">Diajukan</b>';
                                }elseif ($hise->status==1) {
                                  echo '<b style="color:teal">Diproses</b>';
                                }elseif ($hise->status==2) {
                                  echo '<b style="color:red">Ditolak</b>';
                                }elseif ($hise->status==3) {
                                  echo '<b style="color:green">Diterima</b>';
                                }
                                 ?>
                              </td>
                            </tr>
                        <?php
                        $e++;

                        }
                        }
                        ?>
                      <?php }else{ ?>
                        <?php
                          $e=1;
                          foreach ($document as $hise) {

                            ?>

                            <tr>
                              <td scope='row'><?php echo $e ?></td>
                              <td><?php echo TanggalIndo($hise->tgl_contract); ?></td>
                              <td><?php echo $hise->namedoc ?></td>
                              <td><?php echo $hise->ketdok ?></td>
                              <td>
                                <?php
                                if($hise->status==0) {
                                  echo '<b style="color:orange">Diajukan</b>';
                                }elseif ($hise->status==1) {
                                  echo '<b style="color:teal">Diproses</b>';
                                }elseif ($hise->status==2) {
                                  echo '<b style="color:red">Ditolak</b>';
                                }elseif ($hise->status==3) {
                                  echo '<b style="color:green">Diterima</b>';
                                }
                                 ?>
                              </td>
                            </tr>
                        <?php
                        $e++;


                        }
                        ?>
                      <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
