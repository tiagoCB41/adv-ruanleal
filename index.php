<?php
require_once "dbconfig.php";
//require "classes/Helper.php";
//require "classes/Url.class.php";
//$URI = new URI();
//''
?>

<?php
error_reporting(~E_ALL); // avoid notice

if (isset($_POST['btnsave'])) {
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $message = $_POST['message'];
}
if (empty($nome)) {
  $errMSG = "Por favor, insira o nome";
}

if (empty($telefone)) {
  $errMSG = "Por favor, insira o telefone para contato";
}

if (!isset($errMSG)) {
  $stmt = $DB_con->prepare('INSERT INTO formulario (nome,telefone,email,estado,cidade,mensagem) VALUES(:unome,:utelefone,:uemail,:uestado,:ucidade,:umessage)');
  $stmt->bindParam(':unome', $nome);
  $stmt->bindParam(':utelefone', $telefone);
  $stmt->bindParam(':uemail', $email);
  $stmt->bindParam(':uestado', $estado);
  $stmt->bindParam(':ucidade', $cidade);
  $stmt->bindParam(':umessage', $message);


  if ($stmt->execute()) {
    echo ("<script>alert (\"Mensagem enviada com sucesso, aguarde retorno.\")
    window.location.href = './index.php';
    </script>");
  } else {
    echo "deu erro";
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Ruan Leal Sociedade de Advogados</title>
  <meta content="Ruan, Leal,Sociedade,Advogados" name="keywords">
  <meta content="Ruan Leal Sociedade de Advogados">
  <meta property="og:title" content="Ruan Leal Sociedade de Advogados" />
  <meta property="og:url" content="http://br410.teste.website/~cairod46/ruanleal/assets/img/logo.png" />
  <meta property="og:image" content="http://br410.teste.website/~cairod46/ruanleal/assets/img/logo.png" />
  <meta property="og:description" content="Ruan Leal Sociedade de Advogados" />
  <link href="./assets/img/logo.png" rel="icon">
  <link href="./assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<body>

  <!-- ======= Header ======= -->


  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <h1><img src="./assets/img/logo.png" alt=""></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">Sobre nós</a></li>
          <li><a href="#faq">Atuação</a></li>
          <li><a href="#team">Artigos</a></li>
          <li><a href="#recent-posts">Noticias</a></li>
          <li><a style="color:white;" id="contato" href="#contact">Contato</a></li>
          <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                </path>
              </svg></a></li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide agro">
          <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <img style="width: 38%;" src="./assets/img/banners/solucao.png">

            <img style="width: 98%;margin-top: 3%;" src="./assets/img/banners/agro/agro 2.png">
          </div>
        </div>
        <div class="swiper-slide ambiental">
          <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <img style="width: 38%;" src="./assets/img/banners/solucao.png">

            <img style="width: 98%; margin-top: 3%;" src="./assets/img/banners/ambiental/ambiental 1.png">
          </div>
        </div>
        <div class="swiper-slide empresarial">
          <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <img style="width: 38%;" src="./assets/img/banners/solucao.png">

            <img style="width: 98%; margin-top: 3%;" src="./assets/img/banners/empresarial/empresarial 1.png">
          </div>
        </div>


      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>



    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-6">
            <h3><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
              </svg>Quem somos</h3>

            <p>O escritório “Ruan Leal Sociedade de Advogados" nasceu do sonho de seu idealizador em aplicar e consolidar a teoria assimilada na graduação e nas especializações, na busca por efetivação de justiça em favor dos clientes.</p>
            <p>Após anos de experiência advogando em prol de Produtores Rurais e Empresas Agrícolas na região do MATOPIBA, o fundador montou uma equipe técnica multidisciplinar, capaz de atender a todas as exigências jurídicas da cadeia do Agronegócio, promovendo ainda, de forma ininterrupta, os investimentos necessários para a manutenção de um atendimento especializado e atualizado com o que há de mais moderno no mundo jurídico.</p>
            <p>Inovação, ética e confiança são os valores que movem o escritório em direção ao seu maior objetivo, construir relações de longo prazo com seus assistidos.</p>

          </div>
          <div class="col-lg-6">
            <div id="raulResponse" class="content ps-0">
              <div style="margin-top: -40px !important; display: flex; justify-content: left !important;" class="position-relative mt-4">
                <img id="ruanF" src="assets/img/ruanLeal.png" class="img-fluid" alt="">
                <img id="latF" src="assets/img/Pattern 1.png" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container" data-aos="fade-up">
        <div style="display: flex; align-items: center; justify-content: center;" class="row gy-4">
          <div style="width: 47%;" class="col-lg-6">
            <div class="content ps-0" style="margin-top: 0px !important;">
              <img id="logoResponse" src="assets/img/Frame 78.png" class="img-fluid" alt="">
            </div>
          </div>
          <div style="margin: 60px 0 0 20px;" class="col-lg-5">
            <h3 style="color: #789840;">Ruan Oliveira Leal</h3>
            <p>Sócio-Fundador, advogado com anos de militância no setor do agronegócio, possui Pós-Graduação em Direito
              Civil pela Pontifícia Universidade Católica de Minas – PUC/MG e MBA em Agronegócio pela Universidade de
              São Paulo – USP.</p>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->


    <section id="faq" class="faq">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <h2 class="text-center">Nossas Áreas de Atuação</h3>
            <div id="ask" class="col-lg-10">
              <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                      Agronegócio
                    </button>
                  </h3>
                  <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      Fornecemos a toda a cadeia do agronegócio, desde a aquisição de propriedades agrícolas até a distribuição do produto final, soluções jurídicas e administrativas assertivas, personalizadas de acordo com os objetivos do cliente.
                      Serviços: <br><br>
                      . Elaboração de pareceres jurídicos; <br>
                      . Elaboração e revisão de contratos de operações que envolvem produtos agrícolas; <br>
                      . Elaboração de defesas administrativas junto aos órgãos municipais, estaduais e federais; <br>
                      . Elaboração e acompanhamento de ações judiciais na justiça comum e tribunais superiores; <br>
                      . Elaboração e acompanhamento de defesas na justiça comum e Tribunais Superiores; <br>
                      . Elaboração e acompanhamento de requerimentos e procedimentos junto as instituições financeiras e players de mercado.
                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                      Ambiental
                    </button>
                  </h3>
                  <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Elaboração de pareceres jurídicos; <br>
                      . Acompanhamento em procedimentos de Licenciamento Ambiental; <br>
                      . Acompanhamento em procedimentos fiscalizatórios movidos pelas autoridades públicas; <br>
                      . Aconselhamento e acompanhamento na formalização de termos de compromisso e termos de ajuste de conduta;<br>
                      . Elaboração e acompanhamento de defesas administrativas e judiciais.

                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                      Empresarial
                    </button>
                  </h3>
                  <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                    . Elaboração, revisão e discussão de contratos empresariais; <br>
                    . Assessoria e consultoria jurídica com relação a títulos de crédito; <br>
                    . Assessoria e consultoria jurídica com relação a marcas e patentes; <br>
                    . Assessoria e consultoria jurídica em recuperações judiciais, extrajudiciais e falências; <br>
                    . Assessoria e consultoria jurídica em resolução de conflitos empresariais e societários, tanto extrajudicialmente quanto judicialmente.
                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                      Fundiário
                    </button>
                  </h3>
                  <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Análise de risco em aquisições de imóveis rurais; <br>
                      . Elaboração de contratos de compra e venda de imóvel rural; <br>
                      . Elaboração e acompanhamento de procedimentos de regularização fundiária;<br>
                      . Elaboração e acompanhamento de ações judiciais visando o reconhecimento possessório e de domínio;<br>
                      . Elaboração e acompanhamento de defesas na justiça comum e tribunais superiores.

                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                      Contratual
                    </button>
                  </h3>
                  <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Apoio integral na estruturação, negociação, gerenciamento de riscos e resolução de conflitos relacionados aos Contratos Comerciais que envolvem toda a cadeia do Agronegócio.
                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-6">
                      Tributário
                    </button>
                  </h3>
                  <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Identificação de oportunidades e benefícios tributários que possam representar aumento de receita; <br>
                      . Assessoria para recuperação e monetização de créditos tributários;<br>
                      . Emissão de Pareceres; <br>
                      . Defesas em autos de infração e execuções fiscais.
                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-7">
                      Trabalhista
                    </button>
                  </h3>
                  <div id="faq-content-7" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Elaboração e acompanhamento de defesas nas esferas administrativa e judicial; <br>
                      . Auditoria dos procedimentos trabalhistas; <br>
                      . Aconselhamento e acompanhamento em negociações envolvendo rescisões contratuais.
                    </div>
                  </div>
                </div><!-- # Faq item-->

                <div class="accordion-item">
                  <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-9">
                      Recuperação de Crédito
                    </button>
                  </h3>
                  <div id="faq-content-9" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                      . Apoio integral na formalização de cobranças judiciais e extrajudiciais; <br>
                      . Aconselhamento em operações de renegociação de dívidas; <br>
                      . Análise e aconselhamento sobre a formalização de garantias; <br>
                      . Adoção de medidas judiciais pertinentes a discussões sobre saldo devedor e inscrição indevida em cadastros de inadimplentes;

                    </div>
                  </div>
                </div><!-- # Faq item-->

                <a href="">
                  <div class="accordion-item">
                    <h3 id="accordion-wpp" class="accordion-header text-center">
                      Para mais informações. Whatsapp
                    </h3>
                  </div>
                </a>

              </div>

            </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->







    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">
    <?php
        $stmt = $DB_con->prepare("SELECT * FROM posts WHERE tipo = 'artigo' ");
        $stmt->execute();
        if ($stmt->rowCount() > 0) { ?>
          <h2 class="text-center">Artigos</h2>

          <br><br>

          <div class="row gy-4">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
            ?>
              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                  <img style="min-height: 310px; object-fit: cover;" src="./admin/uploads/posts/<?php echo $row['img']; ?>" class="img-fluid" alt="">
                  <h4><?php echo $titulo; ?></h4>
                  <span><?php echo $subtitulo; ?></span>
                </div>
              </div><!-- End Team Member -->
          <?php }
          } ?>

          </div>
      </div>
    </section><!-- End Our Team Section -->
    <?php
    $stmt = $DB_con->prepare("SELECT * FROM posts WHERE tipo = 'noticia' ");
    $stmt->execute();
    if ($stmt->rowCount() > 0) { ?>
      <!-- ======= Recent Blog Posts Section ======= -->
      <section id="recent-posts" class="recent-posts sections-bg">
        <div class="container" data-aos="fade-up">
          <h2 class="text-center"><strong>Noticias</strong></h2>
          <br><br>
          <div class="row gy-4">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
            ?>
              <div class="col-xl-4 col-md-6">
                <article>
                  <div class="post-img">
                    <img src="./admin/uploads/posts/<?php echo $row['img']; ?>" alt="" class="img-fluid">
                  </div>
                  <p class="post-category"><?php echo $descricao; ?></p>
                  <h2 class="title">
                    <a href="blog-details.html"><?php echo $titulo; ?></a>
                  </h2>
                  <div class="d-flex align-items-center">
                    <div class="post-meta">
                      <p class="post-author"><?php echo $subtitulo; ?></p>
                      <p class="post-date">
                        <time datetime="2022-01-01"><?php echo $data; ?></time>
                      </p>
                    </div>
                  </div>
                </article>
              </div><!-- End post list item -->
            <?php } ?>
          </div><!-- End recent posts list -->
        </div>
      </section><!-- End Recent Blog Posts Section -->
    <?php } ?>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <h2 style="margin-top: 0px;" class="text-center"><strong>Contato</strong></h2>
        <br><br>
        <div class="row gx-lg-0 gy-4">
          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Localização:</h4>
                  <p>Rua Acésio do Rêgo Monteiro, 1515, Bairro Ininga, Teresina/PI, 64.049-610, Ed.Antônio Portela, Sala 303.</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>advruanleal@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Whatsapp/Telefone:</h4>
                  <p>(86) 99958-9852</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Aberto às:</h4>
                  <p>Dias úteis: 08:00 - 18:00</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input value="<?php echo $nome; ?>" type="text" name="nome" class="form-control" id="nome" placeholder="Qual seu nome" required>
                </div>
                <div class="col-md-5 form-group">
                  <input value="<?php echo $telefone; ?>" type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite seu telefone" required>
                </div>
                <div class="col-md-7 form-group mt-3 mt-md-0">
                  <input value="<?php echo $email; ?>" type="email" class="form-control" name="email" id="email" placeholder="Seu email" required>
                </div>
                <div class="col-md-6 form-group">
                  <input value="<?php echo $estado; ?>" type="text" name="estado" class="form-control" id="estado" placeholder="Escolha seu Estado" required>
                </div>
                <div class="col-md-6 form-group">
                  <input value="<?php echo $cidade; ?>" type="text" name="cidade" class="form-control" id="cidade" placeholder="Escolha sua cidade" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea value="<?php echo $message; ?>" class="form-control" name="message" rows="7" placeholder="Mensagem" required></textarea>
              </div>
              <div class="my-3">
                <div class="sent-message"><span><?php echo $msgsucess ?></span></div>
              </div>
              <div class="text-center"><button type="submit" name="btnsave">Tire suas dúvidas</button></div>
            </form>
          </div><!-- End Contact Form -->


        </div>

      </div>

    </section><!-- End Contact Section -->
    <section style="margin-top: -50px;" id="footer">
      <div class="container">
        <hr><br>
        <div style="margin-top: -20px;" class="row justify-content-between">
          <div class="col-6">
            <span class="text-footer">© 2022 Ruan Leal Sociedade de Advogados - Todos os Direitos Reservados</span>
          </div>
          <div style="text-align: right;" class="col-4">
            <a href="https://www.instagram.com/prodois/"><span class="text-footer">Desenvolvido pela PRO2 Branding e Design <img src="./assets/img/Logo pro2 Assinatura siter2 1.png" width="20px"></span></a>
          </div>
        </div>
      </div>
    </section>


  </main><!-- End #main -->



  <a href="https://api.whatsapp.com/send?phone=5586999589852" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>




</body>

</html>