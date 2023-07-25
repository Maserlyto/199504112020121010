<div class="row mt-2">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_peserta; ?></h3>

                <p>Total Peserta</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $posisi['Programmer'] ?></h3>

                <p>Posisi Programmer Melamar</p>
            </div>
            <div class="icon">
                </i><i class="fas fa-user-astronaut"></i>
            </div>
            <a href="#" data-toggle="modal" data-target="#modal-jenis" class="small-box-footer my-tooltip" title="Diklik Untuk Melihat data">Read More <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $satker_total; ?></h3>

                <p>Total Satker</p>
            </div>
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="#" data-toggle="modal" data-target="#modal-satker" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $mobile['ya'] ?></h3>

                <p>Pernah Membuat Mobile</p>
            </div>
            <div class="icon">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <a href="#" data-toggle="modal" data-target="#modal-mobile" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row mt-2">
    <div class="col-9">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bullhorn"></i> &nbsp;Seluruh Data Rekrutmen</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="rekrut" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Satuan Kerja</th>
                            <th>Posisi Yang Dipilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        if ($rekrut) : ?>
                            <?php foreach ($rekrut as $rek) : ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $rek['nama'] ?></td>
                                    <td><?= $rek['nip'] ?></td>
                                    <td><?= $rek['satuan_kerja'] ?></td>
                                    <td><?= $rek['posisi_yang_dipilih'] ?></td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">No data found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Satuan Kerja</th>
                            <th>Posisi Yang Dipilih</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Browser Usage</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="far fa-circle text-danger"></i> PHP</li>
                            <li><i class="far fa-circle text-success"></i> Javascript</li>
                            <li><i class="far fa-circle text-warning"></i> Java</li>
                            <li><i class="far fa-circle text-info"></i> Python</li>
                            <li><i class="far fa-circle text-primary"></i> Flutter</li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light p-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PHP
                            <span class="float-right text-danger">
                                <i class="fas fa-arrow-down text-sm"></i>
                                12%</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Javascript
                            <span class="float-right text-success">
                                <i class="fas fa-arrow-up text-sm"></i> 4%
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Java
                            <span class="float-right text-warning">
                                <i class="fas fa-arrow-left text-sm"></i> 0%
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Python
                            <span class="float-right text-warning">
                                <i class="fas fa-arrow-left text-sm"></i> 0%
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Flutter
                            <span class="float-right text-warning">
                                <i class="fas fa-arrow-left text-sm"></i> 0%
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.footer -->
        </div>
    </div>
</div>


<div class="modal fade" id="modal-jenis">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Referensi Posisi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createForm" action="<?php echo site_url('pengawasan/refbid/create'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <table id="rekrut" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Posisi</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                if ($posisi) : ?>
                                    <?php foreach ($posisi as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?= $key; ?></td>
                                            <td><?= $value; ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Posisi</th>
                                    <th>Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-satker">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Referensi Satker</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table id="satker_all" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Satker</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($satker) : ?>
                                <?php foreach ($satker as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $key; ?></td>
                                        <td><?= $value; ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Posisi</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-mobile">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Referensi Mobile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table id="mobile" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pernah Membuat Mobile</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($mobile) : ?>
                                <?php foreach ($mobile as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $key; ?></td>
                                        <td><?= $value; ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Posisi</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>