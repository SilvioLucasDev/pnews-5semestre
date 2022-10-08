<?php
require_once 'includes/header.php';
?>

<link rel="stylesheet" type="text/css" href="../assets/css/modal.css">

<style>
	.mainCustom {
		height: 83vh;
	}

	#map {
		height: 100%;
		width: 100%;
	}
</style>

<main class="mainCustom">
	<div class="container h-100 pt-md-3 pb-5">
		<div class="row justify-content-center h-100">
			<div class="col">

				<!-- DIV QUE É EXIBIDO O MAPA -->
				<div id="map"></div>

			</div>
		</div>
	</div>
</main>

<div style="display: none">
	<button type="hidden" class="btn btn-primary" name="showModal" id="showModal" data-toggle="modal" data-target="#modalIncludeMaps">
		modal
	</button>
</div>

<!-- MODAL -->
<div class="modal fade t-modal" id="modalIncludeMaps" tabindex="-1" role="dialog" aria-labelledby="modalAlterarSenha" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-header text-center">
				<h5 class="modal-title">Cadastro de borracharia</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<div class="row justify-content-and">
						<div class="col-12 text-center align-self-center">
							<form id="cadBorracharia" style="margin: 10px 20px 10px 20px;" action="../controller/borrachariaController.php" method="POST">

								<input class="form-control my-2 borda" type="text" name="nome" id="nome" placeholder="Nome da borracharia" required>

								<input class="form-control my-2 borda" type="text" name="telefone" id="telefone" placeholder="Telefone borracharia">

								<input class="form-control my-2 borda" type="text" name="email" id="email" placeholder="E-mail borracharia">

								<input type="text" name="inputCoords" id="inputCoords" hidden>

							</form>
						</div>
					</div>

					<div class="row">
						<div class="col text-center borda-form p-0">
							<button id="btnCadBorracharia" name="cadBorracharia" form="cadBorracharia" type="submit" class="btn btn-secondary btn-block rounded-0 m-0" style="border-bottom-left-radius: 0.2rem !important; border-bottom-right-radius: 0.2rem !important;"> Enviar</button>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- FIM MODAL -->

<script>
    var URL = "<?php echo URL ?>";

	var lat = -23.551260514373695
	var lng = -46.63441780394384

	//PEGA AS COORDENADAS DO USUÁRIO
	navigator.geolocation.watchPosition(initMap, error)

	//EXIBE OS ERROS SE CASO A API NÃO CONSEGUIR PEGAR AS COORDENAS DO USUÁRIO
	function error(error) {
		switch (error.code) {
			case error.PERMISSION_DENIED:
				console.log("Usuário rejeitou a solicitação de Geolocalização.")
				break;

			case error.POSITION_UNAVAILABLE:
				console.log("Localização indisponível.")
				break;
				
			case error.TIMEOUT:
				console.log("O tempo da requisição expirou.")
				break;

			case error.UNKNOWN_ERROR:
				console.log("Algum erro desconhecido aconteceu.")
				break;
		}

		initMap()
	}


	function initMap(position = null) {
		if(position) {
			lat = position.coords.latitude,
			lng = position.coords.longitude
		}
	
		//DEFINE CUSTOMIZAÇÕES INICIAIS E INSTÃNCIA O MAPA
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 13,
			center: {lat: lat,lng: lng},
			styles: [
				{
					"featureType": "poi",
					"stylers": [{
						"visibility": "off"
					}]
				}
			]
		});

		//MARCADOR DA LOCALIZÃO ATUAL DO USUÁRIO
		const marker = new google.maps.Marker({
		position: {lat: lat,lng: lng},
		map: map,
		});


		//ABRE MODAL PARA ADICIONAR NOVA BORRACHARIA
		google.maps.event.addListener(map, 'click',
			function(event) {
				addMarker({ //REMOVER ESSE TRECHO DPS, RESPONSAVEL POR COLOCAR ICON NO MAPA AO CLICKAR.
					coords: event.latLng
				});

				const inputCoords = document.getElementById("inputCoords");
				inputCoords.value = event.latLng;
				document.getElementById("showModal").click();
			})

		//CRIA MARCADORES ALEATÓRIOS DE FORMA "DINÂMICA" // VAI RECEBER ESSES DADOS DIRETO DO BANCO
		const markers = [
			{
				coords: {lat: -23.547141962399672,lng: -46.30199768678884},
				content: '<div dir="ltr" style="" jstcache="0">'
							+'<div jstcache="34" class="poi-info-window gm-style">'
								+'<div jstcache="2">'
									+'<div jstcache="3" class="title full-width" jsan="7.title,7.full-width"> Borracharia do Alemão </div>' 
									
									+'<div class="address">'
										+'<div jstcache="4" jsinstance="0" class="address-line full-width" jsan="7.address-line,7.full-width"> R: Barão de Mauá, 1900 - Jardim Itapeva </div>'

										+'<div jstcache="4" jsinstance="1" class="address-line full-width" jsan="7.address-line,7.full-width"> Mauá - SP </div>'

										+'<div jstcache="4" jsinstance="2" class="address-line full-width" jsan="7.address-line,7.full-width"> 09350-000 </div>'
									+'</div>' 

								+'</div>'

								+'<div jstcache="5" style="display:none"></div>'

								+'<div>'
									+'<a jstcache="6" href="tel:+5511959861303" tabindex="0"><span>Ligar para: +55 11 95986-1303</span></a>'
								+'</div>'
		
							+'</div>'
						+'</div>'
			},
			{
				coords: {lat: -23.647141962399672,lng: -46.40199768678884},
			}
		];

		//VAI LER E EXTRAIR OS DADOS DO JSON RECEBIDO DO BANCO
		for (var i = 0; i < markers.length; i++) {
			addMarker(markers[i]);
		}

		function addMarker(data) {
			var marker = new google.maps.Marker({
				position: data.coords,
				map: map,
				icon: URL + 'assets/img/maps/icon_maps.png'
			})


			if (data.content) {
				var infoWindow = new google.maps.InfoWindow({
					content: data.content
				});

				marker.addListener('click', function(){
					infoWindow.open(map, marker);
				});
			}

		}
	}
</script>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9IWlEU_CZQqtyGqSr-lvN25n43fW6f2g"></script>

<?php
include_once 'includes/footer.php';
?>



<!-- Referência dos ícones do maps -->
<!-- <div> Icons made by 
	<a href="https://www.flaticon.com/authors/iconbaandar" title="IconBaandar"> IconBaandar </a> 
	from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a>
</div> -->