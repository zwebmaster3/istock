<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use App\Article;
use App\Gallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
      return view('panel.index');
    }

    public function newArticleView() {
      return view('panel.new_article');
    }

    public function articles(Request $request) {
      #MODELS
      $article_db = new Article();
      $gallery_db = new Gallery();

      #
      $auth_id = Auth::id();


      $switch_case = $request->switchCase;

      switch($switch_case){
        case 'uploadPreviewCover'://por el momento no se utiliza
          if(!empty($_FILES['coverFile']['name'])){
            $cover_file = '/images/gallery/temp/' . $_FILES['coverFile']['name'];
            $path = public_path() . $cover_file;
            if(move_uploaded_file($_FILES['coverFile']['tmp_name'], $path)){
              chmod($path, 0777);
              $response = [
                'status'  => 'success',
                'message' => 'Archivo Subido correctamente',
                'path' => $cover_file,
              ];
            } else {
              $response = array(
                'status'  => 'error',
                'message' => 'error al subir foto'
              );
            }
          } else {
            $response = array(
              'status'  => 'error',
              'message' => 'error al recibir datos'
            );
          }
          break;
        case 'uploadCoverImage':
          $source = $request->source;
          $file_name = substr(md5(uniqid(rand())), 0, 10) . '.png';
          $cover_image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $source));

          $storage = '/images/gallery/' . $file_name;
          $dest = public_path() . $storage;

          if (file_put_contents($dest, $cover_image)) {
            //$storagePath = $pathBD;
            $article_db->art_cover = $file_name;
            $article_db->art_user_id = $auth_id;

            if($article_db->save()) {
              $response = [
                'status'  => 'success',
                'storagePath' => $storage,
                'fileName' => $file_name,
              ];
            } else {
              $response = [
                'status'  => 'error',
                'message' => 'Error al insertar en la base de datos'
              ];
            }


          } else {
            $response = [
              'status'  => 'error',
              'message' => 'Error al guardar imagen'
            ];
          }
          break;
        case "uploadImageGallery":
          $source = $request->source;
          $file_name = substr(md5(uniqid(rand())), 0, 10) . '.png';
          $cover_image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $source));

          $storage = '/images/gallery/' . $file_name;
          $dest = public_path() . $storage;

          if (file_put_contents($dest, $cover_image)) {
            //$storagePath = $pathBD;
            $gallery_db->gal_art_id = 1;
            $gallery_db->gal_file = $storage;
            $gallery_db->gal_user_id = $auth_id;

            if($gallery_db->save()) {
              $response = [
                'status'  => 'success',
                'storagePath' => $storage,
              ];
            } else {
              $response = [
                'status'  => 'error',
                'message' => 'Error al insertar en la base de datos'
              ];
            }


          } else {
            $response = [
              'status'  => 'error',
              'message' => 'Error al guardar imagen'
            ];
          }

          break;
        default:
          // code...
          $response = [
            'error' => 'Error al seleccionar acción'
          ];
          break;
      }

      return response()->json($response);
    }


}//end class
