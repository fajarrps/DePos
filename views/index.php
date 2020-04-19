<?php get_template_home('header') ?>


<div class="container">
	<ul id="lightSlider">
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	      <li>
	          <img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;">
	      </li>
	    </ul>
	<!-- <div class="my-slider">
	  <div><img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;"></div>
	  <div><img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;"></div>
	  <div><img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;"></div>
	  <div><img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;"></div>
	  <div><img src="<?=get_foto_assets('cafe1.jpg')?>" alt="" style="width: 100%;"></div>
	</div> -->
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
			 	<div class="card-body font14">
			    	<div class="form-group">
					    <label for="exampleFormControlInput1">Nama Cafe</label>
					    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="form-group">
					    <label for="exampleFormControlInput1">Jenis</label>
					    <select class="custom-select custom-select-sm" id="inputGroupSelect02">
				            <option selected>Cafe & Restoran</option>
				            <option value="1">Cafe</option>
				            <option value="2">Restoran</option>
				        </select>
					</div>
					<hr>
					<div class="form-group">
					    <label for="exampleFormControlInput1">Provinsi</label>
					    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="form-group">
					    <label for="exampleFormControlInput1">Kecamatan</label>
					    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
					</div>
					<button type="button" class="btn btn-primary w-100">Cari</button>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
			 	<div class="card-body font14">
	
					<?php for ($i=0; $i < 5; $i++) :?>
						<a href="<?=base_url('home/detail');?>">
						<div class="row">
				 			<div class="col-md-3" >
				 				<div class="card-body align-items-center d-flex left-content-center">
				 				<img src="<?=get_foto_assets('tempat1.jpg')?>" alt="" style="width: 100%;">
				 				</div>
				 			</div>
				 			<div class="col-md-5" >
								<div class="card-body align-items-center ">
				 					<div class="col-md-12">
				 						Nama Toko
				 					</div>
				 					<div class="col-md-12 mt-3">
				 						Alamat
				 					</div>
							    </div>
				 			</div>	
				 			<div class="col-md-3" >
								<div class="card-body align-items-center">
				 					<div class="col-md-12">
				 						&nbsp Rating : 5/5
				 					</div>
				 					<div class="col-md-12">
				 						<img src="<?=get_foto_assets('star.png')?>" alt="" style="height:40px ;">
				 					</div>
							    </div>
				 			</div>			
				 		</div>
				 		<hr>
				 		</a>
					<?php endfor; ?>
			 		
			 	</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_home('footer') ?>