<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Jamp Challenge</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="./node_modules/swiper/dist/css/swiper.min.css"
    />
  </head>
  <body>
    <?php
      $query = strtolower($_GET['query']);
      $headers = array('Accept' => 'application/json');

      $response = Requests::get('https://dev.jampapp.com/api/get_products.php?terms=' . $query, $headers);
      $products = json_decode($response->body, true);

      $generics = $products['generics'];
      $search_results = $products['search_results'];
      $resultsLength = count($search_results);
    ?>

    <nav class="navbar navbar-light bg-white">
        <div class="col-md-8 offset-md-2">
          <div class="d-flex w-100">
            <a href="/">
              <img src="./assets/icons/back_btn.png" height="50" width="50">
            </a>
    
            <div class="input-group input-group--border-light mb-3">
              <div class="input-group-prepend">
                <img src="./assets/icons/search_btn.png">
              </div>
              <input
                name="query"
                type="text"
                class="form-control"
                value="<?= $query ?>"
                placeholder="Buscar pelo nome do produto"
              >
              <div id="clearInput" class="input-group-append mr-4">
                <img src="./assets/icons/clear_btn" style="cursor: pointer">
              </div>
            </div>
          </div>
      </div>
    </nav>

    <?php if($resultsLength > 0): ?>
      <div class="generics-wrapper py-3">
        <div class="container">
          <h5 class="p-3 m-0">Genérico do <?= $query ?></h5>
        </div>

        <!-- Swiper -->
        <div class="swiper-container pb-md-5">
          <div class="swiper-wrapper my-1">
            <?php foreach ($generics as $generic): ?>
              <div class="swiper-slide generic-card">
                <div class="generic-card__cover">
                  <img
                    src="<?= $generic['productImg'] ?>"
                    alt=""
                  />
                </div>

                <div class="generic-card__title">
                  <span><?= $generic['productName'] ?></span>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="results-wrapper my-4">
              <h3 class="results-wrapper__title">
                Encontramos <?= $resultsLength ?> produtos para a busca:
                <span class="text-highlight"><?= $query ?></span>
              </h3>

              <div class="results-wrapper__cards">
                <div class="row no-gutters">
                  <?php foreach ($search_results as $product): ?>
                    <div class="col-6 col-md-3 my-2">
                      <div class="card card--product mx-1">
                        <img
                          class="card-img-top"
                          src="<?= $product['productImg'] ?>"
                          alt="Card image cap"
                        />
                        <div class="card-body">
                          <h5 class="card-title"><?= $product['productName'] ?></h5>

                          <p class="card-text">
                            A partir de
                            <strong
                              class="product--price"
                              data-price="<?= $product['productPrice'] ?>"
                            >
                              <?= $product['productPrice'] ?>
                            </strong>
                          </p>
                          <a href="#" class="btn btn-primary btn-block">
                            Comparar preços
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="col-md-12">
        <div class="d-flex justify-content-center align-self-center">
          <div class="alert alert-light" role="alert">
            <span>Nenhum produto foi encontrado</span>
            <img src="https://image.flaticon.com/icons/svg/187/187150.svg" alt="" height="25" width="25">
          </div>
        </div>
      </div>
    <?php endif ?>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <script src="./node_modules/swiper/dist/js/swiper.min.js"></script>
    
    <script>
      var products_price = ($(".product--price"));
      $(products_price).each(function(index) {
        var price = $(this).data("price")
        $(this).text(price.toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        }))
      })

      // Initialize Swiper
      var swiper = new Swiper(".swiper-container", {
        // slidesPerView: 'auto',
        slidesPerView: 5,
        spaceBetween: 5,
        breakpoints: {
          1440: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 2,
            centeredSlides: true,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          640: {
            slidesPerView: 1.5,
            spaceBetween: 5
          },
          320: {
            slidesPerView: 1.5,
            spaceBetween: 3
          }
        }
      });
    </script>
  </body>
</html>
