<?php

$this->title = 'Rekap Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="box">
   <div class="box-body ">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th>No.</th>
                     <th>Nama Anggota</th>
                     <th>Status</th>
                     <th>Pekerjaan</th>
                     <th>Jumlah Uang</th>
                   </tr>
                 </thead>

                     <?php
                      $i=1;
                     foreach($query as $row) { ?>
                       <tbody>
                   <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $row['anggota_nama']; ?></td>

                     <td><span class="label label-success">Approved</span></td>
                     <td><?php echo $row['pekerjaan_nama']; ?></td>
                     <td><?php echo "Rp. " . number_format($row['total_bayar'], 0, "", '.') . ",-"; ?></td>
                     
                   </tr>
                     <?php } ?>
                   </tbody>
                 </table>
               </div>
  </div>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
