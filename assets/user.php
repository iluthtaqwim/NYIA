<?php
  $koneksi = new mysqli ("localhost","root","","ekabase");
?>
    <div style="text-align: center">
        <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width: 20%; margin-bottom: 5%" alt="" srcset="">
    </div>
    <div class="card">
        <div class="card-header" style="text-align: center">
            <h1>User</h1>
        </div>

        <div>
          <button type="button" class="btn btn-primary" style="width:10%" data-toggle="modal" data-target="#add_user">
            Add User
          </button>
        </div>
        <?php
        $tg= date('Y-m-d');
        ?>



        <div class="card-content">
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>nama</th>
                        <th>Register</th>
                        <th>Last Login</th>
                        <th>Kat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                      $no=1;
                      $sql = $koneksi->query("SELECT * from user ORDER BY register DESC");
                      while ($data=$sql->fetch_assoc()) {
                     ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $no; ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['register'] ?></td>
                            <td><?php echo $data['last_login'] ?></td>
                            <td><?php echo $data['kat'] ?></td>
                            <td>
                              <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#edit<?php echo $data['username']; ?>" value="Edit">Edit</button>

                            </td>
                        </tr>
                    </tbody>
                    <!-- Modal -->
                    <div class="modal fade" tabindex="-1" role="dialog" id="edit<?php echo $data['username']; ?>">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-white" >
                                <h5 class="modal-title"><b style="color:black">Edit Data User</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="bg-light">
                                <div class="card bg-light">
                                  <form class="needs-validation" novalidate="" method="post" action="">
                                    <div class="card-body">
                                      <input type="hidden" class="form-control" name="username" id="" value="<?php echo $data['username'] ?>" placeholder="Nama User">
                                      <br>
                                        <input type="text" class="form-control" name="nama" id="" value="<?php echo $data['nama'] ?>" placeholder="Nama User">
                                        <br>
                                        <input type="text" class="form-control" name="password" id="" value="<?php echo $data['password'] ?>" placeholder="password">
                                        <br>
                                        <input type="text" class="form-control" name="keyuser" id="" value="<?php echo $data['keyuser'] ?>" placeholder="keyuser">
                                        <br>

                                      </div>
                                    </div>
                                            </div>
                                            <div class="modal-footer bg-light">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn text-white" name="simpan_edit" style="background-color: #26aa5b">Simpan</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                    <?php
                      $no++;
                      }
                     ?>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="add_user">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-white" >
                <h5 class="modal-title"><b style="color:black">Tambah Data User</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="bg-light">
                <div class="card bg-light">
                  <form class="needs-validation" novalidate="" method="post" action="">
                    <div class="card-body">
                        <input type="text" class="form-control" name="nama" id="" placeholder="Nama User">
                        <br>
                        <input type="text" class="form-control" name="username" id="" placeholder="Username">
                        <br>
                        <input type="text" class="form-control" name="password" id="" placeholder="password">
                        <br>
                        <input type="text" class="form-control" name="keyuser" id="" placeholder="keyuser">
                        <br>
                        <!-- <label>
                            <b style="font-size:18px">
                              Jabatan
                            </b>
                        </label>
                        <br>
                        <input type="radio" name="jabatan" value="1" checked>1
                        <input type="radio" name="jabatan" value="2">2
                        <br> -->
                        <label>
                            <b style="font-size:18px">
                              Kat
                            </b>
                        </label>
                        <br>
                        <input type="radio" name="kat" value="1" checked>Legal
                        <input type="radio" name="kat" value="2">Sales
                      </div>
                    </div>
                            </div>
                            <div class="modal-footer bg-light">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn text-white" name="simpan" style="background-color: #26aa5b">Simpan</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>

    <?php
    $nama     = @$_POST ['nama'];
    $username = @$_POST ['username'];
    $password = @$_POST ['password'];
    $keyuser  = @$_POST ['keyuser'];
    $jabatan   = @$_POST ['jabatan'];
    $register = date('Y-m-d');
    $status   = @$_POST ['status'];
    $kat   = @$_POST ['kat'];

    if(isset($_POST['simpan'])){
      $sql = $koneksi->query("INSERT INTO user(nama,username,password, keyuser, jabatan, last_login, register, status, kat)
      values('$nama','$username','$password','$keyuser','1','','$register','1','$kat')");

      if($sql== TRUE){
      ?>
        <script type="text/javascript">
          window.location.href="?assets=user";
        </script>
      <?php
      }
    }
    elseif (isset($_POST['simpan_edit'])) {
      $sql2 = $koneksi->query("UPDATE user set
                              nama    ='$nama',
                              password='$password',
                              keyuser ='$keyuser',
                              status  ='$status'
                              where username='$username'");
                if($sql2== TRUE){
                ?>
                <script type="text/javascript">

                window.location.href="?assets=user";
                  </script>
                <?php
        }

      }
    ?>
