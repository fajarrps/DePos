<?php get_template_home('admin/header') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restaurants</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Restaurants Data</h6>
            </div>
            <div class="card-body">
              <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddShopModal"><i class="fa fa-plus fa-sm text-white-50"></i> Add Restaurants</button>
              <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Restoran</th>
                      <th>Kota</th>
                      <th>Alamat</th>
                      <th>Tgl. Terdaftar</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listrestoran as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$value->nama_restoran?></td>
                        <td><?=$value->nama_kab_kota?></td>
                        <td><?=$value->alamat_restoran?></td>
                        <td><?=$value->tgl_terdaftar_restoran?></td>
                        <td><?=strtoupper($value->status_restoran)?></td>
                        <td><a href="<?=base_url('admin/restaurant/detail/').$value->id_restoran?>" class="btn btn-primary btn-xs">&nbsp<i class="fa fa-info" aria-hidden="true"></i>&nbsp</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!--Modal-->
<form action="<?=base_url('admin/restaurant')?>" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="AddShopModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Restaurant</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"> 
            <div class="form-group">
              <label for="NamaMenu">Nama Restoran</label>
              <input type="text" name="nama_restoran" class="form-control" id="NamaMenuID">
            </div>
            <div class="form-group">
              <label for="Kategori">Kategori Restoran</label>
              <select class="custom-select kat" id="kat" name="id_kategori" required>
                <?php foreach ($listkategorirestoran as $key => $value): ?>
                  <option value="<?=$value->id_kategori_restoran?>"><?=strtoupper($value->nama_kategori_restoran)?></option>
                <?php endforeach ?>
              </select>
            </div>
            <br>
            <div class="card">
              <div class="card-header">
                Asal Toko
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="Kategori">Provinsi</label>
                  <select class="custom-select" id="provasal" name="id_provinsi" onchange="getkabkota(this)">
                    <?php foreach ($listprovinsi as $key => $value): ?>
                      <?php if ($value->id_provinsi != 0): ?>
                        <option value="<?=$value->id_provinsi?>"><?=strtoupper($value->nama_provinsi)?></option>
                      <?php endif ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Kategori">Kota</label>
                  <select class="custom-select" id="kota" name="id_kab_kota">
                    <?php foreach ($listkabkota as $key => $value): ?>
                        <option value="<?=$value->id_kab_kota?>"><?=strtoupper($value->nama_kab_kota)?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Harga">Alamat Restoran</label>
                  <textarea name="alamat_restoran" class="form-control" id="alamatID" rows="2"></textarea>
                </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="Telepon">Telepon Restoran</label>
              <input type="text" name="telepon_restoran" class="form-control" id="NamaMenuID" max="40">
            </div>
            <div class="form-group">
              <label for="Meja">Total Meja</label>
              <input type="text" name="meja_restoran" class="form-control" id="NamaMenuID">
            </div>
            <div class="form-group">
              <label for="Harga">Deskripsi Restoran</label>
              <textarea name="deskripsi" class="form-control" id="deskripsiID" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="Foto">Foto</label>
                <input type="file" name="foto" id="file1" onchange="fileValidation('1'); readURL(this, this.id);"><br><br>
                <img id="foto1" src="" style="height: 100px;"/>
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

<script>
function getkabkota(id)
{
  var id = id.value;
  $('#kota').html('');

  $.ajax({
    url : 'ax/getkabkota/'+id,
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