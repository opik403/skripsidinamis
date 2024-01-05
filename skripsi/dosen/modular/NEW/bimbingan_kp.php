<?php include '../config/koneksi.php'; ?>


<section class="content-header">      
    <h1> Bimbingan Kerja Praktek
        <!-- <a href="homepage.php?p=tambah"
            id='btn_add_new_data' class="btn btn-sm btn-success" title="Add Data">
                <i class="fa fa-plus-circle"></i> Add Data
        </a> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bimbingan Kerja Praktek</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $nama_dosen = $_SESSION['nama_do'];?>
    <!-- quick email widget -->
    <div class="box box-info">            
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                <h4>Data Bimbingan Kerja Praktek</h4>
                </div><br/><br/><br/>

                <?php
                    $sql =  "SELECT * FROM bimbingankp WHERE dosen_pembimbing = '$nama_dosen'";
                    $result = mysql_query($sql);
                    $no_urut=1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Dosbing</th>
                            <th>Tanggal Input</th>
                            <th>Aktivitas</th>
                            <!-- <th>Jenis Laporan</th> -->
                            <th>File</th>
                            <th>Status</th>
                            <th>Tanggal Koreksi</th>
                            <th>Uraian</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data = mysql_fetch_array($result)) {
                        ?>    
                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data ['nim']; ?></td>
                            <td><?php echo $data ['nama_lengkap']; ?></td>
                            <td><?php echo $data ['program_studi']; ?></td>
                            <td><?php echo $data ['dosen_pembimbing']; ?></td>
                            <td><?php echo $data ['tgl_input']; ?></td>
                            <td><?php echo $data ['aktivitas']; ?></td>

                            <td><?php echo $data ['file']; ?></td>

                            <?php
								$arSt = array(
                                    "New" => "<span class='label label-warning'>New</span>",
                                    "ACC" => "<span class='label label-success'>ACC</span>",
                                    "Revisi" => "<span class='label label-danger'>Revisi</span>"
                                );
                                    $st = $data['status'];
                                    $status = $arSt[$st];
                            ?>
                            <td><?php echo $status ?></td>

                            <td><?php echo $data ['tgl_koreksi']; ?></td>
                            <td><?php echo $data ['uraian']; ?></td>
                            <td>
                                <a href='homepage.php?p=edit_bimbingan_kp&ubah=<?php echo $data['id_bimbingan'] ?>' >
                                <button id='btn_create' class='btn btn-xs btn-primary' data-toggle='tooltip' data-container='body' title='Ubah'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></a>
                            </td>		     
                        </tr>
                        <?php
                            $no_urut++;
                            }
                        ?>  
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
<!-- /.row (main row) -->
</section>