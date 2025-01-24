@extends('welcome')
@section('main')
    <style>
        .bordered {
            border: 1px solid #000;
            padding: 20px;
            text-align: center;
        }

        .central-column {
            background-color: #f8f9fa; /* Light background for visibility */
        }

        .full-screen {
            height: 100vh; /* Full viewport height */
        }

        #mappa {
            background-color: lightyellow;

        }
#carousel_ovest,#carousel_est,#carousel_nord,#carousel_sud,#map-container{
    position:relative;
}
    </style>
    <div class="row mx-1 full-screen">
        <div class="col-md-1" style="background-color: lightgray">
            Colonna Sinistra
        </div>
        <div class="col-md-10  central-column" id="colonna_centrale">
            <div  id="map-container">
                <div class="h4">Mappa</div>
                <button id="carousel_nord" class="btn_carousel" posizione="N">Nord</button>
                <div id="mappa" game_id="{{ $images_carousel[0]['game_id'] }}" posizione="C" style="background-size: cover;width: 533.33px; height: 300px;background-repeat: no-repeat;
            background-position: center;background-image: url('{{ Storage::disk('public')->url($images_carousel[0]['url_img_map']) }}');">
                    <button id="carousel_ovest" class="btn_carousel" posizione="O">Ovest</button>
                    <button id="carousel_est" class="btn_carousel" posizione="E">Est</button>
                </div>
                <button id="carousel_sud" class="btn_carousel" posizione="S">Sud</button>
            </div>
            <div id="descrizione_mappa">

            </div>
        </div>
        <div class="col-md-1" style="background-color: darkslategray">
            Colonna Destra
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const mappa = document.getElementById('mappa');
    const zone = 20;
    const heigh_mappa=document.getElementById('mappa').offsetHeight;
    const width_mappa=document.getElementById('mappa').offsetWidth;
    const heigh_col_centrale=document.getElementById('colonna_centrale').offsetHeight;
    const width_col_centrale=document.getElementById('colonna_centrale').offsetWidth;
    console.log(heigh_mappa,width_mappa);
    document.getElementById('carousel_ovest').style.top = heigh_mappa/2+"px";
    document.getElementById('carousel_ovest').style.left = "10px";
    document.getElementById('carousel_est').style.top = heigh_mappa/2+"px";
    document.getElementById('carousel_est').style.right = -(width_mappa)+100+"px";
    document.getElementById('carousel_nord').style.left = (width_mappa/2)+"px";
    document.getElementById('carousel_sud').style.left = (width_mappa/2)+"px";
    document.getElementById('map-container').style.left = ((width_col_centrale/2)-(width_mappa/2))+"px";

   /* function generaZone() {
        for (let i = 0; i < zone; i++) {
            const zona = document.createElement('div');
            zona.className = 'zona';

            // Dimensioni casuali
            const width = Math.random() * 80 + 20; // Tra 20 e 100 px
            const height = Math.random() * 80 + 20; // Tra 20 e 100 px
            zona.style.width = width + 'px';
            zona.style.height = height + 'px';

            // Posizione casuale
            const x = Math.random() * (mappa.clientWidth - width);
            const y = Math.random() * (mappa.clientHeight - height);
            zona.style.left = x + 'px';
            zona.style.top = y + 'px';

            // Evento clic
            zona.onclick = function() {
                alert('Hai cliccato sulla zona ' + (i + 1));
            };

            mappa.appendChild(zona);
        }
    }

    generaZone();*/

    $('.btn_carousel').click(function (){
        var btn_position=$(this).attr('id').split("_");
        var game_id=1;

        $.ajax({
            url: "{{ route('getCarousel') }}",
            data: {position: btn_position[1]},
            success: function (response) {
                var position_res = response;
                console.log(position_res);
            }
        })
    });
</script>
    @stop