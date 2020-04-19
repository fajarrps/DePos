<?php get_template_home('header') ?>

<div class="container font14">
	<div class="row">
		<div class="col-md-5 mb-3">
			<ul id="imageGallery" >
			<?php for ($i=1; $i < 5; $i++) :?>
				<li data-thumb="<?=get_foto_assets('z'.$i.'.jpg')?>" data-src="<?=get_foto_assets('z'.$i.'.jpg')?>" style="width: auto;">
			        <img src="<?=get_foto_assets('z'.$i.'.jpg')?>" style="height: 300px; width: 100%;" />
			    </li>
			<?php endfor; ?>
		</div>
		<div class="col-md-7 mb-3">
			<h3>Nama Toko</h3>
			<hr>
			<div class="font13">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>
			<i>Ini Alamat</i><br><br></div>
		</div>
	</div>
	
	<div class="row mt-4">
		<div class="col-md-3 text-center">
			<div class="card">
			  <div class="card-body">
			    Overview
			  </div>
			</div>
		</div>
		<div class="col-md-3 text-center">
			<div class="card">
			  <div class="card-body">
			    Menus
			  </div>
			</div>
		</div>
		<div class="col-md-3 text-center">
			<div class="card">
			  <div class="card-body">
			    Photos
			  </div>
			</div>
		</div>
		<div class="col-md-3 text-center">
			<div class="card">
			  <div class="card-body">
			    Review
			  </div>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-md-6">
			<div class="card" style="max-width: 100%;">
				<div class="card-body font14" style="color: black;">
					<div class="row">
						<div class="col-md-6">
							<div class="col-md-12">
								<b style="font-size: 16px;">Phone Number</b><br>
								<i style="font-size: 15px;">081277771111</i>
							</div>
							<div class="col-md-12 mt-2">
								<b style="font-size: 16px;">Opening Hours</b><br>
								<font style="font-size: 15px;">7 AM - 10 PM</font>
							</div>
							<div class="col-md-12 mt-2">
								<b style="font-size: 16px;">Cuisines</b><br>
								<font style="font-size: 15px;">Indonesia</font>
							</div>
						</div>
						<div class="col-md-6 font13">
							<div class="col-md-12">
								<b style="font-size: 15px;">More Info</b><br>
								Breakfast<br>
								Home Delivery<br>
								No Alcohol Available<br>
								Live Entertainment<br>
								Indoor Seating<br>
								Table booking recommended<br>
								Private Dining Area Available<br>
								Wifi<br>
								Live Music<br>
								Praying Room<br>
								Smoking Area<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card" style="max-width: 100%;">
				<div class="card-body font14" style="color: black;">
					<div class="row">
							<div class="col-md-12">
								<b style="font-size: 16px;">Featured Menu</b><br><hr>
							</div>
							    <ul id="lightSliderSomeMenus">
							      <li style="padding: 10px;">
									    <h3>First Slide</h3>
							          	<p>Lorem ipsum Cupidatat quis pariatur anim.</p>
									  
							      </li>
							      <li style="padding: 10px;">
									    <h3>Second Slide</h3>
							          	<p>Lorem ipsum Cupidatat quis pariatur anim.</p>
									  
							      </li>
							    </ul>
					    <script type="text/javascript">
					      $(document).ready(function() {
					        $("#lightSliderSomeMenus").lightSlider({
					        	item : 1
					        }); 
					      });
					    </script>
					</div>
					<button type="button" class="btn btn-primary">See All Menus</button>
				</div>
			</div>
		</div>

		<div class="col-md-12 mt-4">
			<div class="card">
			  <div class="card-body">
				<b>Address</b><br>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

				<br><br>
				<div id="mapid" style="height: 400px;"></div>
			  </div>
			</div>
		</div>
	</div>

	<script>
		var map = L.map('mapid').setView(['-6.2088', '106.8456'], 5);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZmFqYXJycHMiLCJhIjoiY2sxZjV5bHF1MG02ZTNjbXVvdHIwbGFubSJ9.PFFxGb-ySoloszNTzKXjbQ', {
		    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		    maxZoom: 18,
		    id: 'mapbox.streets',
		    accessToken: 'your.mapbox.access.token'
		}).addTo(map);
	</script>

	

	<div class="row mt-4">
		<div class="col-md-3">
			<div class="card text-white mb-3" style="max-width: 100%;">
			  <div class="card-header bg-primary">Search</div>
			  <div class="card-body font14" style="color: black;">
				<div class="form-group">
				    <label for="exampleFormControlInput1">Nama</label>
				    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="">
				</div>
				<div class="form-group">
				    <label for="exampleFormControlInput1">Kategori</label>
				    <select class="custom-select custom-select-sm" id="inputGroupSelect02">
			            <option selected>All</option>
			            <option value="1">Makanan</option>
			            <option value="2">Minuman</option>
			            <option value="3">Appatizer</option>
			        </select>
				</div>
				<hr>
				<div class="form-group">
				    <label for="exampleFormControlInput1">Range Harga</label>
				    <div class="row font13">
				    	<div class="col-md-6" id="minharga">Rp 5.000</div>
				    	<div class="col-md-6 text-right" id="maxharga">Rp 50.000</div>
				    </div>
				    <!-- <div id="minharga"></div><br><div id="maxharga"></div> -->
				    <input id="ex2" type="text" class="span2" value="" data-slider-min="5000" data-slider-max="300000" data-slider-step="5" data-slider-value="[5000,50000]"/>
				</div>
				<hr>
				<button type="button" class="btn btn-primary w-100">Cari</button>
			  </div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card text-black" style="max-width: 100%;">
			  <div class="card-header bg-primary text-white">List Menu</div>
			  <div class="card-body">
			    <?php for ($i=0; $i < 5; $i++) :?>
						<div class="row">
				 			<div class="col-md-3">
				 				<div class="card-body align-items-center d-flex left-content-center">
				 				<img src="<?=get_foto_assets('indomie.png')?>" alt="" style="width: 100%;">
				 				</div>
				 			</div>
				 			<div class="col-md-4">
								<div class="card-body align-items-center ">
				 					<div class="col-md-12">
				 						Indomie<br><i style="font-size: 11px;">Kategori : blablabla</i>
				 					</div><br>
				 					<div class="col-md-12">
				 						Deskripsi Makanan
				 					</div>
							    </div>
				 			</div>	
				 			<div class="col-md-4">
								<div class="card-body align-items-center">
									<br>
				 					<div class="col-md-12">
				 						<b>Harga : Rp. 12.000</b>
				 					</div>
							    </div>
				 			</div>			
				 		</div>
				 		<hr>
					<?php endfor; ?>
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
}

	// Without JQuery
$("#ex2").slider({step: 5000});
$("#ex2").on("slide", function(slideEvt) {
	$("#minharga").text(convertToRupiah(slideEvt.value[0]));
	$("#maxharga").text(convertToRupiah(slideEvt.value[1]));
});

      $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:5,
            slideMargin:0,
            currentPagerPosition:'left',
            enableTouch:true,
	        enableDrag:true,
	        freeMove:true,
	        swipeThreshold: 40,
	        autoWidth: true,
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }   
        });  
      });      
</script>
<?php get_template_home('footer') ?>