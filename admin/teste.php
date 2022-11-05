<?php
require_once "../dbconfig.php";
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
if (isset($_SESSION['logado'])) :
else :
  header("Location: login.php");
endif;
error_reporting(~E_ALL); // avoid notice

if (isset($_POST['btnsave'])) {
  $titulo = $_POST['titulo'];
  $subtitulo = $_POST['subtitulo'];

  $link = $_POST['link'];
  $link2 = $_POST['link2'];
  $texto_1 = $_POST['texto_1'];
  $texto_2 = $_POST['texto_2'];
  $texto_3 = $_POST['texto_3'];
  $descricao = $_POST['descricao'];
  $autor = $_POST['autor'];
  $tipo = $_POST['tipo'];

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];

  $imgFile2 = $_FILES['user_image2']['name'];
  $tmp_dir2 = $_FILES['user_image2']['tmp_name'];
  $imgSize2 = $_FILES['user_image2']['size'];


  if (empty($titulo)) {
    $errMSG = "Por favor, insira o titulo do post";
  }

  if (empty($subtitulo)) {
    $errMSG = "Por favor, insira o subtitulo do post";
  }

  if (empty($link)) {
    $errMSG = "Por favor, insira o link do facebook";
  }


  else {
    $upload_dir = 'uploads/posts/'; // upload directory

    $imgExt =  strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    $imgExt2 = strtolower(pathinfo($imgFile2, PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
    // rename uploading image
    $userpic = rand(1000, 1000000) . "." . $imgExt;
    $userpic2 = rand(1000, 1000000) . "." . $imgExt2;

    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
      // Check file size '5MB'
      if ($imgSize < 5000000) {
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
      } else {
        $errMSG = "Imagem muito grande.";
      }
    }
    if (in_array($imgExt2, $valid_extensions)) {
      // Check file size '5MB'
      if ($imgSize2 < 5000000) {
        move_uploaded_file($tmp_dir2, $upload_dir . $userpic2);
      } else {
        $errMSG = "Imagem 2 muito grande.";
      }
    }
  }
  if (!isset($errMSG)) {
    $stmt = $DB_con->prepare('INSERT INTO posts (titulo,subtitulo,descricao,link,link2,texto_1,texto_2,texto_3,img,img2,autor,tipo) VALUES(:utitulo,:usubtitulo,:udescricao,:ulink,:ulink2,:utexto_1,:utexto_2,:utexto_3,:upic,:upic2,:uautor,:utipo)');
    $stmt->bindParam(':utitulo', $titulo);
    $stmt->bindParam(':usubtitulo', $subtitulo);
    $stmt->bindParam(':udescricao', $descricao);
    $stmt->bindParam(':ulink', $link);
    $stmt->bindParam(':ulink2', $link2);
    $stmt->bindParam(':utexto_1', $texto_1);
    $stmt->bindParam(':utexto_2', $texto_2);
    $stmt->bindParam(':utexto_3', $texto_3);
    $stmt->bindParam(':upic', $userpic);
    $stmt->bindParam(':upic2', $userpic2);
    $stmt->bindParam(':uautor', $autor);
    $stmt->bindParam(':utipo', $tipo);

    if (empty($imgFile2)) {
      $stmt->bindValue(':upic2', $nulo);
      $nulo = '';
    }

    if (!empty($imgFile2)) {
      $stmt->bindParam(':upic2', $userpic2);
    }

    if (empty($imgFile)) {
      $stmt->bindValue(':upic', $nulo);
      $nulo = '';
    }

    if (!empty($imgFile)) {
      $stmt->bindParam(':upic', $userpic);
    }

    if ($stmt->execute()) {
      echo ("<script>window.location = 'dashboard.php';</script>");
    } else {
      $errMSG = "Erro..";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
  <title>SG Sports - Sistema de Streamers e Influenciadores</title>
  <meta content="SG Sports - Sistema de Streamers e Influenciadores" name="description">
  <meta content="SG Sports, Sistema de Streamers, Influenciadores" name="keywords">
  <!-- Favicons -->
  <link href="img/SG.png" rel="icon">
  <link href="img/SG.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
            orangeapcef: '#E96708',
            blueapcef: '#013589',
            redapcef: '#ed1b24'
          }
        }
      }
    }
  </script>
</head>

<body>
  <div x-data="setup()" :class="{ 'dark': isDark }">
    <?php include "./components/nav.php" ?>

    <body class="text-blueGray-700 antialiased">

      <div class="relative md:ml-64 bg-blueGray-50">

        <!-- Header -->
        <div class="relative bg-cocais-primary md:pt-16 pb-32 pt-12">
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap">
            <div class="w-full px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <?php
                  if (isset($errMSG)) {
                  ?>
                    <div class="alert alert-danger">
                      <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueapcef text-xl font-bold">
                      Adicionar Postagem
                    </h6>
                    <a href="painel-blog.php">
                      <button class="bg-blueapcef text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                        Voltar
                      </button>
                    </a>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form method="POST" enctype="multipart/form-data">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                      Informações
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Título
                          </label>
                          <input value="<?php echo $titulo; ?>" name="titulo" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Título do Post" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Subtítulo
                          </label>
                          <input value="<?php echo $subtitulo; ?>" name="subtitulo" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Subtitulo do post" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Categoria 1
                          </label>
                          <select name="tipo" class="uppercase mb-2 border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                          <option value=''></option>  
                          <option value="apcef">apcef</option>
                            <option value="fenae">fenae</option>
                            <option value="galeria">galeria</option>
                          </select>
                          <a href="add-tipo.php?tipo=post">
                            Adicionar Categoria <i class="bi bi-plus-circle-fill"></i>
                          </a>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">

                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            link
                          </label>
                          <input value="<?php echo $link; ?>" name="link" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Link do facebook da postagem" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Link 2
                          </label>
                          <input value="<?php echo $link2; ?>" name="link2" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Link do instagram da postagem" />
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Texto 1
                          </label>
                          <textarea value="<?php echo $texto_1; ?>" name="texto_1" type="text" id="default" placeholder="Texto da postagem"></textarea>
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Texto 2
                          </label>
                          <textarea value="<?php echo $texto_2; ?>" name="texto_2" type="text" id="default" placeholder="Texto da postagem"></textarea>
                        </div>
                      </div>
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Texto 3
                          </label>
                          <textarea value="<?php echo $texto_3; ?>" name="texto_3" type="text" id="default" placeholder="Texto da postagem"></textarea>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Descrição
                          </label>
                          <input value="<?php echo $descricao; ?>" name="descricao" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="descrição" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">

                      </div>

                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                      Imagens
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Capa
                          </label>
                          <div style="position: relative;" class="file-loading">
                            <input id="curriculo" class="file" data-theme="fas" type="file" name="user_image" accept="image/*">
                          </div>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Banner
                          </label>
                          <div class="file-loading">
                            <input id="curriculo" class="file" data-theme="fas" type="file" name="user_image2" accept="image/*">
                          </div>
                        </div>
                      </div>

                      <input value="<?php echo $_SESSION['nome']; ?>" name="autor" type="hidden" />
                      <button class="bg-blueapcef text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit" name="btnsave">
                        Adicionar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
  </div>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    /* Make dynamic date appear */
    (function() {
      if (document.getElementById("get-current-year")) {
        document.getElementById(
          "get-current-year"
        ).innerHTML = new Date().getFullYear();
      }
    })();
    /* Sidebar - Side navigation menu on mobile/responsive mode */
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("bg-white");
      document.getElementById(collapseID).classList.toggle("m-2");
      document.getElementById(collapseID).classList.toggle("py-3");
      document.getElementById(collapseID).classList.toggle("px-6");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }
  </script>
  <script src="./assets/js/fileinput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js" integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    tinymce.init({
      selector: 'textarea#default',
      plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
      menu: {
        tc: {
          title: 'Comments',
          items: 'addcomment showcomments deleteallconversations'
        }
      },
      menubar: 'file edit view insert format tools table tc help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment'
    });
  </script>
  </div>
  <script src="./assets/js/fileinput.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
  </script>

</body>