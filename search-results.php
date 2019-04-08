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
</table>

    <nav class="navbar navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="./assets/imgs/logo_jamp.png" alt="" />
        </a>

        <div class="right-side">
          <a class="btn-img">
            <img src="./assets/icons/profile_img.png" alt="" />
          </a>
        </div>
      </div>
    </nav>

    <div class="generics-wrapper py-3">
      <h5 class="p-3 m-0">Genérico do Tylenol</h5>

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
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
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
                          <strong>R$ <?= $product['productPrice'] ?></strong>
                        </p>
                        <a href="#" class="btn btn-primary btn-block btn-lg"
                          >Comparar preços</a
                        >
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
      setTimeout(function() {
        // document.location.reload()
      }, 8000);
      $("#exampleModalLong").modal("show");

      // Initialize Swiper
      var swiper = new Swiper(".swiper-container", {
        // slidesPerView: 'auto',
        slidesPerView: 5,
        spaceBetween: 5,
        breakpoints: {
          1024: {
            slidesPerView: 4,
            spaceBetween: 40
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30
          },
          640: {
            slidesPerView: 1.5,
            spaceBetween: 5
          },
          320: {
            slidesPerView: 1,
            spaceBetween: 10
          }
        }
      });
    </script>
  </body>
</html>
