<?php get_template_home('admin/header') ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
            </div>
            <div class="card-body">
              <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddMenuModal"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah Menu</button>
              <div class="table-responsive mt-3">
                <table class="table table-bordered font12table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Menu</th>
                      <th>Kategori</th>
                      <th>Sub Kategori</th>
                      <th>Asal Kota</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Tgl. Upload</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listmenu as $key => $value): ?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td class="text-center" style="width: 20%;"><img src="<?=$value->foto_menu?>" style="width: 80%;"></td>
                        <td><?=$value->nama_menu?></td>
                        <td><?=$value->namakategori?></td>
                        <td><?=$value->namasubkategori?></td>
                        <td><?=$value->namakabkota?></td>
                        <td>Rp <?=rupiah($value->harga_menu)?></td>
                        <td><?=$value->diskon_menu?>%</td>
                        <td><?=$value->tgl_upload_menu?></td>
                        <td><button class="d-none d-sm-inline-block btn btn-xs btn-success shadow-sm" data-toggle="modal" data-target="#EditMenuModal">&nbsp<i class="fa fa-edit fa-sm"></i>&nbsp</button></td>
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

<form action="<?=base_url('admin/menu/')?>" method="POST" enctype="multipart/form-data">
  <div class="modal fade font12table" id="AddMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script>
function getsubkat(id)
{
  var id = id.value;
  $('#subkat').html('');

  $.ajax({
    url : 'ax/getsubkat/'+id,
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
    url : 'ax/getkabkota/'+id,
    type : 'GET',
    dataType : 'JSON',
    success : function (result)
    {
      $('#kota').append('<option value=""></option>')
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