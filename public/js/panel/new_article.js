var vanilla;

//validate if exist in db
var isRegister = 0;
var articleId = 0;

(function(){
  setTimeout(function() {
      console.clear();
  }, 1000);
}());

function chooseImage(e){
  var element = $(e.target).data("target");
  switch (element) {
    case 'inputFileCover':
      $("#inputFileCover").val('').click();
      break;
    case 'inputFileGallery':
      $("#inputFileGallery").val('').click();
    default:
  }
}



$("#inputFileCover").change(function() {
  if(typeof vanilla === 'undefined'){

  } else {
    vanilla.destroy();
  }
  var file = this.files[0];
  var match = ['image/jpg', 'image/jpeg', 'image/png'];

  var reader = new FileReader();

  if(file.type == match[0] || file.type == match[1] || file.type == match[2]) {

    reader.onload = function (e) {
        //$('#coverImg').attr('src', e.target.result);
        var el = document.getElementById('cropImage');
        vanilla = new Croppie(el, {
          viewport: { width: 150, height: 150 },
          boundary: { width: 200, height: 200 },
          showZoomer: true,
          enableOrientation: false
        });
        vanilla.bind({
          url: e.target.result,
          orientation: 4
        });
    };

    $("#contentSelectImage").hide();
    $("#contentCropImage").show();

    reader.readAsDataURL(file);

    /*
    var formData = new FormData();
    formData.append('coverFile', file);
    formData.append('switchCase', 'uploadPreviewCover');
    formData.append('_token', CSRF_TOKEN);

    $.ajax({
      url: 'articles',
      type: 'POST',
      data: formData,
      cache: false,
      dataType: 'JSON',
      processData: false,
      contentType: false,
      success: function(response){
        var status = response.status;
        if(status == "success") {
          var path = response.path
          var url = base_path + path;

          var el = document.getElementById('cropImage');
          vanilla = new Croppie(el, {
            viewport: { width: 150, height: 150 },
            boundary: { width: 200, height: 200 },
            showZoomer: true,
            enableOrientation: false
          });
          vanilla.bind({
            url: url,
            orientation: 4
          });

          $("#contentSelectImage").hide();
          $("#contentCropImage").show();

        }

        if(status == "error") {

        }
      },
      error: function(jqXHR, exception){
        getAjaxMessageError(jqXHR, exception);
      }
    });*/

  } else {
    swal({
      type: 'error',
      title: 'Error',
      text: 'El formato de archivo que intenta subir no esta permitido. Formatos permitidos (.jpg, .jpeg, .png)',
      confirmButtonText: 'Aceptar'
    });
  }

});

$("#inputFileGallery").change(function() {
  if(typeof vanilla === 'undefined'){

  } else {
    vanilla.destroy();
  }

  var file = this.files[0];
  var match = ['image/jpg', 'image/jpeg', 'image/png'];

  var reader = new FileReader();

  if(file.type == match[0] || file.type == match[1] || file.type == match[2]) {
    reader.onload = function(e){
      var el = document.getElementById("cropImageGallery");
      vanilla =  new Croppie(el, {
        viewport: { width: 150, height: 150},
        boundary: { width: 200, height: 200},
        showZoomer: true,
        enableOrientation: false
      });
      vanilla.bind({
        url: e.target.result,
        orientation: 4
      });
    }
    $("#contentSelectImageGallery").hide();
    $("#contentCropImageGallery").show();

    reader.readAsDataURL(file);
  } else {
    swal({
      type: 'error',
      title: 'Error',
      text: 'El formato de archivo que intenta subir no esta permitido. Formatos permitidos (.jpg, .jpeg, .png)',
      confirmButtonText: 'Aceptar'
    });
  }
});


function saveImage(e) {
  var swithcase = $(e.target).data("swithcase");
  var size = {width: 500, height: 500};
  vanilla.result({type: 'base64', size: size}).then(function(base64) {
    //console.log(base64);
    var data = {
      '_token': CSRF_TOKEN,
      'source' : base64,
      'switchCase' : swithcase
    };

    $.ajax({
      url: 'articles',
      type: 'POST',
      data: data,
      dataType: 'JSON',
      success: function(response){
        if(response.status == "success") {
          //vanilla.destroy();
          if(swithcase == "uploadCoverImage") {
            isRegister = 1;
            var spi = response.storagePath;
            var fileName = response.fileName;

            var src = base_path+spi;

            $("#contentSelectImage").show();
            $("#contentCropImage").hide();
            $("#coverImg").attr('src', src);
          }

          if(swithcase == "uploadImageGallery") {
            var spi = response.storagePath;
            var fileName = response.fileName;

            $("#contentSelectImageGallery").show();
            $("#contentCropImageGallery").hide();

            var src = base_path+spi;

            // crear el nuevo elemento
            var newElement = '<div class="col-md-3 col-sm-3 col-xs-12">';
                newElement+=  '<a href="javascript:void(0)" class="thumbnail">';
                newElement+=    '<img id="galleryImg" src="'+src+'" alt="image-gallery">';
                newElement+=  '</a>';
                newElement+= '</div>';

            $("#galleryContent").append(newElement);
          }
        }

        if(response.status == "error") {
          alert(response.message);
        }
      },
      error: function(jqXHR, exception){
        getAjaxMessageError(jqXHR, exception);
      }
    });
  });
}


function saveImage_(){
  var size = { width: 700, height: 400 };
  vanilla.result({type: 'base64', size: size}).then(function(base64) {
    console.log(base64);
    //console.log(window.URL.createObjectURL(blob));
    $("#input-ienx").val('');
    $("#contentUploadImageGallery").show();
    $("#contentCropImage").hide();

    var tmp_path = $("#imgCropImage").attr('src');

    //tmp_path.replace(/^.*[\\\/]/, '');

    var source_ = base64;
    var tmp_path_ = tmp_path;
    var idMultimediaProveedor = $("#idMultimediaProveedorImageCrop").val();
    var data = {
      idMultimedia: idMultimediaProveedor,
      source: source_,
      tmp_path: tmp_path_,
      switchCase: 'moveimagen',
      idService: currentServiceActive
    };

    $.ajax({
      url: '/provider/proveedor/updatemultimedia',
      type: 'POST',
      data: data,
      dataType: 'JSON',
      success: function(response){
        if(response.status == "success"){
          vanilla.destroy();
          swal({
            title: '¡Genial!',
            text: 'Imagen subida correctamente',
            type: 'success',
            timer: 1500,
            showConfirmButton: false
          });

          var url = data.source;
          var enGaleria = 1;

          var img = '<div id="trjtFicha' + idMultimediaProveedor + '" class="trjt-ficha">' +
              '                    <div class="men-fxd-fotos" onmousemove="myFunction(this)" onmouseout="clearCoor()">' +
              '                      <ul class="opc-proveedr">' +
              '                        <div class="divlist">' +
              '                          <a href="javascript:void(0)" class="setProfilePhoto" data-url="' + url + '">' +
              '                            <li class="li">Foto de perfil</li>' +
              '                          </a>' +
              '                          <a href="javascript:void(0)" id="idMultimedia' + idMultimediaProveedor + '" class="menu-borderbot setRemoveGallery" data-idmultimedia="' + idMultimediaProveedor + '" data-ingallery="' + enGaleria + '">' +
              '                            <li class="li">';
            var text = (enGaleria == 0) ? 'Agregar a galería' : 'Quitar de galería';
            img += '                         <span id="spanIdMultimedia' + idMultimediaProveedor + '">' + text + '</span>' +
              '                            </li>' +
              '                          </a>' +
              '                          <a href="javascript:void(0)" onclick="deletecontentgallery(' + idMultimediaProveedor + ', 0)"' +
              '                             class="menu-borderbot">' +
              '                            <li>Eliminar</li>' +
              '                          </a>' +
              '                        </div>' +
              '                        <div class="arrow_top"></div>' +
              '                      </ul>' +
              '                    </div>' +
              '                    <div class="imagg-datos" url="' + url + '" data-fancybox' +
              '                         data-src="#fanxiFoto" href="javascript:void(0);"' +
              '                         style="background-image: url(' + url + ');"></div>\n' +
              '                  </div>';

            $("#content_fichafoto").append(img);
        }
      }
    });

  });
}
