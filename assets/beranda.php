<?php

//AddHistory(GetUsername(),GetPassword(),Keterangan::MASUK_PORTAL,$user->keyuser());
    $history = GetHistory();
    
?>
<div>
    <div style="" class="card">
        
        <div class="card-body">
            <h1 style="text-align:center " class="card-title">HISTORY</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>username</th>
                        <th>tanggal</th>
                        <th>keterangan</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $e = 0;
                    foreach($history as $hist){
                        $e++;
                            tableHistory($hist,$e);
                    }
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
