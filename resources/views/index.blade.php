@extends('layouts.master')

@section('css')
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">-->
<link id="cardStyles" rel="stylesheet" href="{{ asset('css/cards_style_list.css') }}">
<style media="screen">
  .content {
    max-width: 900px;
    /*margin: 15px auto;
    /*padding: 10px;
    /*   outline: 1px solid #ccc; */
  }

  .-m-3 {
    margin: 1.25rem;
  }
</style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Inicio
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">

    <!--<div class="flex flex-wrap -m-3">
      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(http://www.voragolive.com/images/productos/audio/headphones/HPB-600/audifonos-diadema-bluetooth-vorago-HPB-600-titulo.png);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">Audífonos Vorago</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>Audífonos tipo diadema Vorago </p>
            </div>
            <a href="#" class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(http://www.voragolive.com/images/productos/audio/earphones/ep-101/audifonos-vorago-EP-101-2.jpg);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">Audifonos Vorago </h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>Audifonos tipo chupon Vorago</p>
            </div>
            <a href="#" class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(https://img.pccomponentes.com/articles/6/69775/orbegozo-pw-11018-ventilador-sobremesa-usb-gris.jpg);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">Mini ventilador</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>Mini ventilador USB Metal</p>
            </div>
            <a href="#" class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(https://www.novicompu.com/3457-thickbox_default/mini-ventilador-portatil-usb-o-pilas-one.jpg);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">Mini Ventilador de baterías</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>Ventiralador de baterías recargable</p>
            </div>
            <a href="#" class="border-t border-grey-light pt-2 text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(https://media.aws.alkosto.com/media/catalog/product/cache/6/image/69ace863370f34bdf190e4e164b6e123/k/i/kingston_dt101g2_8gb_02.png);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">USB Kingstone</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>USB Kingstone 8GB</p>
            </div>
            <a href="#" class="border-t border-grey-light pt-2  text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
          <div class="bg-cover h-48" style="background-image: url(https://i.linio.com/p/5f0102f396f1e3df7153a2b4810a2309-product.jpg);"></div>
          <div class="p-4 flex-1 flex flex-col" style="">
            <h3 class="mb-4 text-2xl">USB Iron Man</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1">
              <p>USB figura Iron Man 1TB</p>
              </div>
            <a href="#" class="border-t border-grey-light pt-2  text-xs text-grey hover:text-red uppercase no-underline tracking-wide" style="">Actualizar Stock</a>
          </div>
        </div>
      </div>


    </div>-->
    <form class="sidebar-form">
      <div class="input-group">
        <input id="search" type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
          <button class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>

    <div class="flex flex-wrap -m-3">
      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3 card" data-nombre="Lago" data-descripcion="Lorem ipsum dolor sit amet">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col card-content">
          <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1523978591478-c753949ff840?w=900);"></div>
          <div class="p-4 flex-1 flex flex-col card-description-content"  style="">
            <h3 class="mb-4 text-2xl card-title">Lago</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1 card-description">
              <span>
                Lorem ipsum dolor sit amet</div>
            <div class="border-t border-grey-light pt-2 text-xs text-grey card-options hover:text-red uppercase no-underline tracking-wide">
              Options
            </div>
          </div>
        </div>
      </div>
      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3 card" data-nombre="ciudad" data-descripcion="consectetur adipiscing elit lectus">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col card-content">
          <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1525935944571-4e99237764c9?w=900);"></div>
          <div class="p-4 flex-1 flex flex-col card-description-content"  style="">
            <h3 class="mb-4 text-2xl card-title">Ciudad</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1 card-description">
              <span>
                 consectetur adipiscing elit lectus, </span>
            </div>
            <div class="border-t border-grey-light pt-2 text-xs text-grey card-options hover:text-red uppercase no-underline tracking-wide">
              Options
            </div>
          </div>
        </div>
      </div>
      <div class="w-full sm:w-1/2 md:w-1/5 flex flex-col p-3 card" data-nombre="humo" data-descripcion="ipsum lectus">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col card-content">
          <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1486506574467-c44963fc7876?w=900);"></div>
          <div class="p-4 flex-1 flex flex-col card-description-content"  style="">
            <h3 class="mb-4 text-2xl card-title">humo</h3>
            <div class="mb-4 text-grey-darker text-sm flex-1 card-description">
              <span>
                ipsum lectus
              </span>
            </div>
            <div class="border-t border-grey-light pt-2 text-xs text-grey card-options hover:text-red uppercase no-underline tracking-wide">
              Options
            </div>

            <!--<a href="#" class="border-t border-grey-light pt-2 text-xs text-grey card-options hover:text-red uppercase no-underline tracking-wide" style="">Twitter</a>-->
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

@endsection

@section('javascript')
<script type="text/javascript">
  $(".view-mode-button").click(function() {
    var currentView = $(this).data("view");
    var linkTag = $("#cardStyles");
    console.log(currentView);

    switch (currentView) {
      case "list":
        linkTag.attr("href", "{{ asset('css/cards_style_column.min.css') }}");
        $(this).data("view", "column").find('img').attr("src", "{{ asset('images/icons/view_list.svg') }}");
        break;
      default:
        linkTag.attr("href", "{{ asset('css/cards_style_list.css') }}");
        $(this).data("view", "list").find('img').attr("src", "{{ asset('images/icons/view_column.svg') }}");
    }
  });

  $('#search').keyup(function(event){
    var text = $("#search").val();
    if (text == "") {
      $(".flex-wrap").show();
    } else {
      console.log('la tabla debe ocultarse');
      $(".card").hide();
      $(".card").each(function( index ) {
        var cadena1 = $(this).data("nombre").toLowerCase();
        var cadena2 = $(this).data("descripcion").toLowerCase();
        var nuevaCadena1 = cadena1.replace($("#search").val().toLowerCase(), "-");
        var nuevaCadena2 = cadena2.replace($("#search").val().toLowerCase(), "-");

        console.log(nuevaCadena1);
        console.log(nuevaCadena2);

        if (nuevaCadena1 != cadena1 ||
          nuevaCadena2 != cadena2 ) {
          $(this).show();
        }
      });
    }
  });
</script>
@endsection
