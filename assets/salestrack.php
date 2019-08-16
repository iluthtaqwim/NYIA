<?php
$files = GetDataFilesSales($userData->keyuser());
    $a=0;
    foreach($files as $file){
        $a++;
        $ket_kont = $file->GetKeteranganDoc();
        $namedoc = $file->GetNameDoc();
        $takon = $file->GetTanggalKontrak();
    echo "
    <tr>
        <td scope='row'>$a</td>
        <td>$takon</td>
        <td>";
        $link_data = $file->GetListData();
        $message_data = $file->GetMessage();
        $total_message = count($message_data);
        $con_stat = $file->GetStatus();
        $alink = 0;
        $jumlahDataLink = count($link_data);
        
        foreach($link_data as $link){
            $link_datas = $link->GetLink();
            $linkUpload = $link->GetDate();
            if($link->id == 0){
      //          if($link->status==1)
                $alink++;
                if($alink<$jumlahDataLink && $alink<=$total_message){
                     echo"<a href='$link_datas' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a>";
                            $ruru = $alink-1;
                                $value = $message_data[$ruru]->Value();
                                echo"
                                <div class='alert alert-warning' role='alert'>
                                $value 
</div>";
                                 
                }else{
                    echo"<a href='$link_datas' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $linkUpload - (Mengirim File -> Legal)</a></br>";
                }
            }elseif($link->id == 1){
                echo"<a href='$link_datas' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>";
                $jumlahDataLink--;
            }else {
                $jumlahDataLink-=2;
            }
        }
        if($con_stat==1){
                 $ff = $file->GetKeyBerkas();
                 echo '
                <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi
  </button>
  <div class="dropdown-menu p-4">
  
                ';
                echo"
                <div class='input-group mb-1'>
                  <div class='custom-file'>
                  <form action='doing.php' method='post' enctype='multipart/form-data'>
                  <input type='hidden' name='indexde' value='$ff'>
                    <input type='file' accept='application/pdf' class='form-control' name='files' id='file' placeholder='Lampiran'>
                  </div>
                  <div class='input-group-append'>
                    <input type='submit' value ='Submit'<span class='input-group-text' id=''></span>
                  </div>
                  </form>
                </div>
                </div>
</div>
                ";
        }
        
        
        echo "
        </td>
        <td>";
        
        
          $jumlahDataLink = count($link_data);
          $aku = 0;
          foreach($link_data as $link){
                  $aku++;
            
                if($link->id==0) {
                      if($aku<$jumlahDataLink){
                        echo" $link->validate - $link->raw</br></br>";
                      }else{
                        if($con_stat==0||$con_stat==1){
                    //     echo"
                    //   Menunggu Verifikasi
                    //   ";
                    }else if($con_stat==2||$con_stat==3){
                        echo"
                          $link->validate - $link->raw
                            ";
                      }
                    }
                }else if($link->id==1){
                    echo"
                         $link->date - $link->raw</br>
                            ";
                }
            }
            echo"
            </td>
        <td>";
        if($con_stat==2)
        {
            foreach($link_data as $link){
            if($link->id==2){
                echo"<a href='$link->link' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>";
            }
        }
        
                $ff = $file->GetKeyBerkas();
                echo"
                <div class='input-group mb-3'>
                  <div class='custom-file'>
                  <form action='doing.php' method='post' enctype='multipart/form-data'>
                  <input type='hidden' name='indexd' value='$ff'>
                    <input type='file' accept='application/pdf' class='form-control' name='files' id='file' placeholder='Lampiran'>
                  </div>
                  <div class='input-group-append'>
                    <input type='submit' value ='Submit'<span class='input-group-text' id=''></span>
                  </div>
                  </form>
                </div>
                ";
        }else if($con_stat>=3){
            foreach($link_data as $link){
            if($link->id==2){
                echo"<a href='$link->link' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>";
                    }
                }
                $linkcon = $file->GetLinkConfirm();
                $date = $file->GetDateConfirm();
                echo"
                <a href='$linkcon' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a>
                
                ";
        }
        echo"
        </td>
        <td>";
        if($con_stat==3){
                echo"
                Dalam Prosses Legal
                ";
        }else if($con_stat>=4){
            echo"
                Data Terkonfirmasi
                ";
        }
         echo"
        </td>
        <td>";
        if($con_stat==4){
            $linkcon = $file->GetLinkConfirm();
                $date = $file->GetDateConfirm();
                echo"
                Dalam Prosses Legal
                ";
        }else if($con_stat>=5){
                echo"
                Data Terkonfirmasi
                ";
        }
         echo"
        </td>
        <td>";
        if($con_stat>=5){
                                echo " <button class='btn btn-success' disabled><i class='fa fa-check' aria-hidden='true'></i></button>";
        }else{
                                echo "<button class='btn btn-danger' disabled ><i class='fa fa-times' aria-hidden='true'></i></button>";
        }
        echo"</td>
    </tr>
    ";
    }
?>