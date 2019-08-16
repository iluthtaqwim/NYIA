<?php

//AddHistory(GetUsername(),GetPassword(),Keterangan::MASUK_PORTAL,$user->keyuser());
    
?>
<div>
        <div style="" class="card mt-5">
        <div class="card-header " style="text-align: center">
            <h1>History</h1>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
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
                    $history = GetHistory();
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
