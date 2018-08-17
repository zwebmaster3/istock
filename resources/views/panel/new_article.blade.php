@extends('layouts.master')

@section('title', 'Nuevo')

@section('css')
<style media="screen">
  .crop-image{
    background-color: #fff;
    border: 1px solid #ffffff;
    border-radius: 4px;
    transition: 0.3s;
  }

  .crop-image:hover{
    border: 1px solid #337ab7;
  }
  .crop-image-footer{
    margin-top: 10px;
  }

</style>
@endsection

@section('content')

<section class="content-header">
  <h1>
    Registrar Artículo
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#"><i class="fa fa-plus"></i> Registrar Artículo</a></li>
  </ol>
</section>

<section class="content">

  <div class="row">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Datos generales</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12 col-md-4">
              <div id="contentSelectImage">
                <input id="inputFileCover" type="file" style="display:none">
                <a href="javascript:void(0)" class="thumbnail">
                  <img id="coverImg" src="{{ asset('images/resource/placeholder-image.png') }}" onclick="chooseImage(event)" data-target="inputFileCover" alt="cover_image" style="height: auto; width: 100%;">
                </a>
              </div>
              <div id="contentCropImage" style="display: none">
                <div class="crop-image">
                  <br>
                  <div id="cropImage"></div>
                </div>
                <div class="text-center crop-image-footer">
                  <button class="btn btn-primary" onclick="chooseImage(event)" data-target="inputFileCover"><i class="fa fa-folder-open"></i> Elegir Imagen</button>
                  <button class="btn btn-primary" onclick="saveImage(event)" data-swithcase="uploadCoverImage"><i class="fa fa-save"></i> Guardar</button>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" class="form-control" placeholder="Nombre del artículo">
              <br>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <textarea class="form-control" placeholder="description"></textarea>
              <br>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <input type="text" class="form-control" placeholder="Clave">
              <br>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cantidad">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> </button>
                </span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" placeholder="Precio de Compra">
              </div>
            </div>

            <div class="col-md4 col-sm-4 col-xs-12">
              <select id="" class="form-control">
                <option>-- Categoría --</option>
              </select>
              <!-- <div class="input-group">
                <input type="text" class="form-control" placeholder="Categoría">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> </button>
                </span>
              </div> -->
              <br>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cantidad de reserva">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> </button>
                </span>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" placeholder="Precio de Venta">
              </div>
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
          <div class="row">
            <div class="col-xs-12 col-md-12">
              <button type="button" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
  </div>


  <div class="row">

    <div class="col-md-8">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Galeria de imágenes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row" id="galleryContent">
            <!-- <div class="col-md-3 col-sm-3 col-xs-12">
              <a href="javascript:void(0)" class="thumbnail">
                <img id="galleryImg" src="{{ asset('images/resource/image-placeholder-multiple.png') }}" onclick="chooseImage(event)" alt="gallery">
              </a>
            </div> -->
            <!-- Gallery -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="alert bg-gray disabled text-center">
                <strong>¡Sin imágenes!</strong> No hay imágenes para mostrar.
              </div>
            </div>
            @for ($i = 0; $i < 4; $i++)
            <div class="col-md-3 col-sm-3 col-xs-12">
              <a href="javascript:void(0)" class="thumbnail">
                <img id="coverImg" src="{{ asset('images/resource/camera.png') }}" alt="image-gallery" style="height: auto; width: 100%;">
              </a>
            </div>
            @endfor






          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Seleccionar imágenes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div id="contentSelectImageGallery">
                <input type="file" id="inputFileGallery" style="display: none">
                <a href="javascript:void(0)" class="thumbnail">
                  <img id="galleryImg" src="{{ asset('images/resource/open-file-button.png') }}" onclick="chooseImage(event)" data-target="inputFileGallery" alt="gallery" style="height: 130px; margin: 60px 120px;">
                </a>
              </div>
              <div id="contentCropImageGallery" style="display: none">
                <div class="crop-image">
                  <br>
                  <div id="cropImageGallery"></div>
                </div>
                <div class="text-center crop-image-footer">
                  <button class="btn btn-primary" onclick="chooseImage(event)" data-target="inputFileGallery"><i class="fa fa-folder-open"></i> Elegir Imagen</button>
                  <button class="btn btn-primary" onclick="saveImage(event)" data-swithcase="uploadImageGallery"><i class="fa fa-save"></i> Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
@endsection

@section('javascript')
<script src="{{ asset('js/panel/new_article.js') }}" charset="utf-8"></script>
<script type="text/javascript">

</script>
@endsection
