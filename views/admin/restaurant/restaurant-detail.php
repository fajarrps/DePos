<?php get_template_home('admin/header') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurant</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail <?=$detail->nama_restoran?></h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 text-center">
                  <img src="<?=$detail->foto_profil?>" style="width: 80%">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-4">
                      Nama Restoran
                    </div>
                    <div class="col-md-8">
                      <?=$detail->nama_restoran?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Kategori Restoran
                    </div>
                    <div class="col-md-8">
                      <?=ucwords($detail->nama_kategori_restoran)?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Deskripsi
                    </div>
                    <div class="col-md-8">
                      <?=$detail->deskripsi_restoran?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Provinsi
                    </div>
                    <div class="col-md-8">
                      <?=$detail->nama_provinsi?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Kab / Kota
                    </div>
                    <div class="col-md-8">
                      <?=$detail->nama_kab_kota?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Alamat
                    </div>
                    <div class="col-md-8">
                      <?=$detail->alamat_restoran?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Telepon
                    </div>
                    <div class="col-md-8">
                      <?=$detail->telepon_restoran?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Total Meja
                    </div>
                    <div class="col-md-8">
                      <?=$detail->meja_restoran?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Tgl. Terdaftar
                    </div>
                    <div class="col-md-8">
                      <?=tgl_ina($detail->tgl_terdaftar_restoran)?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      Status
                    </div>
                    <div class="col-md-8">
                      <?=strtoupper($detail->status_restoran)?>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <?php if ($detail->latitude_restoran != ''): ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      Lokasi
                    </div>
                    <div class="card-body">
                      <div id="mapid" style="height: 400px;"></div>
                    </div>
                  </div>
                </div>

                <script>
                  var map = L.map('mapid').setView([<?php echo $detail->latitude_restoran; ?>, <?php echo $detail->longitude_restoran; ?>], 15);
                  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZmFqYXJycHMiLCJhIjoiY2sxZjV5bHF1MG02ZTNjbXVvdHIwbGFubSJ9.PFFxGb-ySoloszNTzKXjbQ', {
                      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                      maxZoom: 18,
                      id: 'mapbox.streets',
                      accessToken: 'your.mapbox.access.token'
                  }).addTo(map);

                  var marker = L.marker([<?php echo $detail->latitude_restoran; ?>, <?php echo $detail->longitude_restoran; ?>]).addTo(map);
                  var popup = marker.bindPopup('<?php echo "<b>$detail->nama_restoran</b><br>$detail->alamat_restoran"; ?>');

                </script>
              <?php endif ?>
              <hr>
              <div class="row font12table">
                <div class="col-md-6">
                  <h4>List User</h4>
                  <?php if ($this->sess['level_admin'] == 'super_admin'): ?>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3" data-toggle="modal" data-target="#AddUserModal"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah User</button>
              
                    <!--Modal-->
                    <form action="<?=base_url('admin/restaurant/detail/').$detail->id_restoran?>" method="POST" enctype="multipart/form-data">
                      <div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body"> 
                                <div class="form-group">
                                  <label for="NamaAdmin">Nama Admin</label>
                                  <input type="text" name="nama_admin" class="form-control" id="NamaMenuID">
                                </div>
                                <div class="form-group">
                                  <label for="Username">Username</label>
                                  <input type="text" name="username" class="form-control" id="NamaMenuID">
                                </div>
                                <div class="form-group">
                                  <label for="Password">Password</label>
                                  <input type="password" name="password" class="form-control" id="NamaMenuID">
                                </div><br>
                                <div class="form-group">
                                  <select class="custom-select" id="" name="level_admin"> 
                                    <option value="admin">Admin</option>
                                    <option value="finance_admin">Finance Admin</option>
                                  </select>
                                </div>
                                 
                                <div class="form-group">
                                  <label for="Foto">Foto Admin</label>
                                    <input type="file" name="foto" id="file1" onchange="fileValidation('1'); readURL(this, this.id);"><br><br>
                                    <img id="foto1" src="" style="height: 130px;"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                  <?php endif ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Tgl. Aktif</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listuser as $key => $value): ?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td><?=$value->nama_admin?></td>
                          <td><?=$value->tgl_mulai?></td>
                          <td><?=strtoupper($value->status_admin)?></td>
                          <td><a href="<?=base_url('admin/user/detail/').$value->id_admin?>" class="btn btn-primary btn-xs">&nbsp<i class="fa fa-info" aria-hidden="true"></i>&nbsp</a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <h4>List Menu</h4>
                  <?php if ($this->sess['level_admin'] == 'finance_admin'): ?>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3" data-toggle="modal" data-target="#AddMenuModal"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah Menu</button>
                    
                    <form action="<?=base_url('admin/menu/')?>" method="POST" enctype="multipart/form-data">
                      <div class="modal fade" id="AddMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body"> 
                                <div class="form-group">
                                  <label for="NamaMenu">Nama Menu</label>
                                  <input type="text" name="nama_menu" class="form-control" id="NamaMenuID">
                                </div>
                                <div class="form-group">
                                  <label for="Kategori">Kategori Menu</label>
                                  <select class="custom-select kat" id="kat" name="id_kategori" onchange="getsubkat(this)" required>
                                    <?php foreach ($listkategori as $key => $value): ?>
                                      <option value="<?=$value->id_kategori_menu?>"><?=strtoupper($value->nama_kategori_menu)?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="Kategori">Sub Kategori Menu</label>
                                  <select class="custom-select" id="subkat" name="id_sub_kategori">
                                    <?php foreach ($listsubkategori as $key => $value): ?>
                                      <option value="<?=$value->id_sub_kategori_menu?>"><?=strtoupper($value->nama_sub_kategori_menu)?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                                <br>
                                <div class="card">
                                  <div class="card-header">
                                    Asal Menu
                                  </div>
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="Kategori">Provinsi</label>
                                      <select class="custom-select" id="provasal" name="id_provinsi" onchange="getkabkota(this)">
                                        <?php foreach ($listprovinsi as $key => $value): ?>
                                          <option value="<?=$value->id_provinsi?>"><?=strtoupper($value->nama_provinsi)?></option>
                                        <?php endforeach ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="Kategori">Kota</label>
                                      <select class="custom-select" id="kota" name="id_kab_kota">
                                        <option value="0"></option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <br>
                                <div class="form-group">
                                  <label for="Harga">Harga</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" class="form-control" name="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="Diskon">Diskon (Optional)</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control" name="diskon" onkeydown="return numbersonly(this, event);" value="0">
                                    <div class="input-group-append">
                                      <div class="input-group-text">%</div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="Foto">Foto</label>
                                    <input type="file" name="foto" id="file2" onchange="fileValidation('2'); readURL(this, this.id);"><br><br>
                                    <img id="foto2" src="" style="height: 100px;"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                  <?php endif ?>
                  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listmenu as $key => $value): ?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td class="text-center"><img src="<?=$value->foto_menu?>" style="width: 60%"></td>
                          <td><?=$value->nama_menu?></td>
                          <td><?=strtoupper($value->status_menu)?></td>
                          <td><a href="<?=base_url('admin/menu/detail/').$value->id_menu?>" class="btn btn-primary btn-xs">&nbsp<i class="fa fa-info" aria-hidden="true"></i>&nbsp</a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>
  $(document).ready( function () {
    $('#dataTable2').DataTable();
} );

function getsubkat(id)
{
  var id = id.value;
  $('#subkat').html('');

  $.ajax({
    url : '<?php echo base_url("admin/ax/getsubkat/") ?>'+id,
    type : 'GET',
    dataType : 'JSON',
    success : function (result)
    {
      $('#subkat').append('<option value=""></option>')
      $.each(result, function(i, data){
        $('#subkat').append
        (`
          <option value="`+data.id_sub_kategori_menu+`">`+data.nama_sub_kategori_menu.toUpperCase()+`</option>
        `)
      });
    }
  });
}

function getkabkota(id)
{
  var id = id.value;
  $('#kota').html('');

  $.ajax({
    url : '<?php echo base_url("admin/ax/getkabkota/") ?>'+id,
    type : 'GET',
    dataType : 'JSON',
    success : function (result)
    {
      $.each(result, function(i, data){
        $('#kota').append
        (`
          <option value="`+data.id_kab_kota+`">`+data.nama_kab_kota.toUpperCase()+`</option>
        `)
      });
    }
  });
}

</script>


<?php get_template_home('admin/footer') ?>