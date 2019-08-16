<?php
$files = GetDataFiles();
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
        $con_stat = $file->GetStatus();
        $alink = 0;
        $jumlahDataLink = count($link_data);
        foreach($link_data as $link){
            $alink++;
            if($link->id==0){
            $link_datas = $link->GetLink();
            $linkUpload = $link->GetDate();
            
                if($alink<$jumlahDataLink){
                  echo"
                  $linkUpload - $link->raw</br>";
                }else{
                    //if($con_stat!=0){
                    echo"$linkUpload - $link->raw</br>";
                    //}
                }
            }else{
                $alink--;
            }
        }
        
        if($con_stat==1){
           echo"
            Perbaikan
            ";
        }
        
        
        echo "
        </td>
        <td>";

        $jumlahDataLink = count($link_data);
        $aku = 0;
        foreach($link_data as $link){
            if($link->id==0){
            $aku++;
            $link_datass = $link->GetLink();
                // if($con_stat==0){
                    if($aku<$jumlahDataLink){
                        echo"
                             <a href='$link_datass' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>
                            ";
                    }else{
                        echo"
                             <a href='$link_datass' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>
                            ";
                    }
                // }else if($con_stat==1){
                //     $jumlahDataLink--;
                //     echo"
                //      <a href='$link_datass' id='bottle' ><i class='fa fa-eye' aria-hidden='true'></i> $link->date - (Dari Sales)</a></br>
                //     ";
                // }
            //}
            }else if($link->id==1){
                $jumlahDataLink--;
                echo"
                     <a href='$link_datass' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>
                    ";
            }else if($link->id==2){
                $jumlahDataLink--;
                echo"
                     <a href='$link_datass' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>
                    ";
            }
    
        }

        
        if($con_stat==0){
                $jumlahDataLink = count($link_data);
                $aku = 0;
                
                foreach($link_data as $link){
                    $aku++;
                    if($aku>=$jumlahDataLink){
                       $nno=$link->GetNo();
                    }
                }
                $ketsf = $file->GetKeyBerkas();
                $tag = "#".$ketsf;
                echo '
                <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Verifikasi Data
  </button>
  <div class="dropdown-menu p-4">
  
                ';
                 echo" 
                 
                 </br>======Data Lengkap======</br>
                <form action='doing.php' method='post' enctype='multipart/form-data' >
                <input type='file' accept='application/pdf' class='form-control' name='filex' id='filex' placeholder='Lampiran'>
                <input type='hidden' name='fungsi' value='1'>
                 <input type='hidden' name='indexdata' value='$ketsf'>
                 <input type='hidden' name='nolink' value='$nno'>
                 <button class='btn btn-success' style='width:auto'><i class='fa fa-check'></i></button>
                </form></br>======Ada Masalah Data======</br>
                ";
                echo" 
                <form action='doing.php' method='post' enctype='multipart/form-data' >
                <input type='file' accept='application/pdf' class='form-control' name='filex' id='filex' placeholder='Lampiran'>
                 <input type='hidden' name='indexdata' value='$ketsf'>
                 <input type='hidden' name='nolink' value='$nno'>
                 <textarea rows='2' name='alasanmenolak' placeholder='alasan menolak? (isi untuk mengembalikan)'></textarea>
                 <input type='hidden' name='fungsi' value='0'>
                 <button class='btn btn-success'><i class='fa fa-check'></i></button>
                </form>
                </div>
</div>
                ";
            
        }    
            echo"
            </td>
        <td>";
        
        if($con_stat==2){
               foreach($link_data as $link){
                   if($link->id==2){
                       echo"$link->date - $link->raw</br>";
                   }
               }
               
        }else if($con_stat>=3){
            foreach($link_data as $link){
                   if($link->id==2){
                       echo" $link->date - $link->raw</br>";
                   }
               }
            $linkcon = $file->GetLinkConfirm();
                $date = $file->GetDateConfirm();
                echo"
                $link->date - $link->raw</br>
                ";
        }
        echo"
        </td>
        <td>";
        if($con_stat>=3){
                $jumlahDataLink = count($link_data);
                $aku = 0;
                $akus = 0;
                
                $linkcon = $file->GetLinkConfirm();
                $date = $file->GetDateConfirm();
                echo"<a href='$linkcon' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $date</a></br>";
                
                foreach($link_data as $link){
                    $aku++;
                    if($aku>=$jumlahDataLink){
                       $nno=$link->GetNo();
                    }
                    if($link->id==3){
                        $akus++;
                        echo"<a href='$link->link' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'> $link->date - $link->raw</i> </a></br>";
                    }
                }
                
                $ketsf = $file->GetKeyBerkas();
                if($con_stat==3){
                echo"Kirim Ke Mitra";
                echo"
                <form action='doing.php' method='post' enctype='multipart/form-data' >
                <input type='file' accept='application/pdf' class='form-control' name='filex' id='filex' placeholder='Lampiran'>
                 <input type='hidden' name='indexdata' value='$ketsf'>
                 <input type='hidden' name='nolink' value='$nno'>
                 <input type='hidden' name='fungsi' value='3'>
                 <button class='btn btn-success'><i class='fa fa-check'></i></button>
                </form>
                </br>";
                if($akus>0){
                    echo"
                    <form action='doing.php' method='post' enctype='multipart/form-data' >
                     <input type='hidden' name='fungsi' value='6'>
                     <input type='hidden' name='indexdata' value='$ketsf'>
                     <input type='hidden' name='nolink' value='$nno'>
                     <button class='btn btn-success' value='Confim'>Confirm Data</button>
                     </form>";
                    }   
                    
                }
        }
        echo"
        </td>
        <td>";
        if($con_stat>=4){
                $jumlahDataLink = count($link_data);
                $aku = 0;
                $akus = 0;
                
                foreach($link_data as $link){
                    $aku++;
                    if($aku>=$jumlahDataLink){
                       $nno=$link->GetNo();
                    }
                    if($link->id==4){
                        $akus++;
                        echo"<a href='$link->link' id='bottle' ><i class='fa fa-file-text-o' aria-hidden='true'></i> $link->date - $link->raw</a></br>";
                    }
                }
                $ketsf = $file->GetKeyBerkas();
                if($con_stat==4){
                echo"Kirim Ke General Manager";
                echo"
                <form action='doing.php' method='post' enctype='multipart/form-data' >
                <input type='file' accept='application/pdf' class='form-control' name='filex' id='filex' placeholder='Lampiran'>
                 <input type='hidden' name='indexdata' value='$ketsf'>
                 <input type='hidden' name='nolink' value='$nno'>
                 <input type='hidden' name='fungsi' value='4'>
                 <button class='btn btn-success'><i class='fa fa-check'></i></button>
                </form>
                </br>";
                    if($akus>0){
                    echo"
                    <form action='doing.php' method='post' enctype='multipart/form-data' >
                     <input type='hidden' name='fungsi' value='6'>
                     <input type='hidden' name='indexdata' value='$ketsf'>
                     <input type='hidden' name='nolink' value='$nno'>
                     <button class='btn btn-success' value='Confim'>Confirm Data</button>
                     </form>";
                    }   
                }
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