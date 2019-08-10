<?php
  $koneksi = new mysqli ("localhost","root","","ekabase");

?>
    <div style="text-align: center">
        <img src="assets/img/Angkasa_Pura_logo_2011.svg.png" style="width: 20%; margin-bottom: 5%" alt="" srcset="">
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
                              <a href="" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                      $no++;
                      }
                     ?>
            </table>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="add_user"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="nama" id="" placeholder="Nama User">
          <br>
          <input type="text" class="form-control" name="username" id="" placeholder="Username">
          <br>
          <input type="text" class="form-control" name="password" id="" placeholder="password">
          <br>
          <input type="text" class="form-control" name="keyuser" id="" placeholder="keyuser">
          <br>
          <label>
              <b style="font-size:18px">
                Jabatan
              </b>
          </label>
          <br>
          <input type="radio" name="jabatan" value="1" checked>1
          <input type="radio" name="jabatan" value="2">2
          <br>
          <label>
              <b style="font-size:18px">
                Kat
              </b>
          </label>
          <br>
          <input type="radio" name="kat" value="1" checked>1
          <input type="radio" name="kat" value="2">2
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" name="simpan" class="btn btn-primary" ></button>
      </div>
    </div>
  </form>
  </div>
</div>

<?php
//sampe sini uwo


if(isset($_POST['nama']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['keyuser']) && isset($_POST['jabatan']) && isset($_POST['kat'])){
    $usere = CekUser($_POST['username'],$_POST['password']);
    if($usere!=null){
        AddHistory($_POST['username'],$_POST['password'],Keterangan::MASUK_PORTAL,$usere->keyuser());
        InputUser($_POST['nama'] ,$_POST['username'],$_POST['password'],$_POST['keyuser'],$_POST['jabatan'] ,$_POST['kat']);
        header("location:index.php");
        echo $usere->kat();
    }
}
