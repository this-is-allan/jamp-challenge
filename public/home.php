<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jamp's challenge</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="./assets/imgs/logo_jamp.png" alt="" />
      </a>
    
      <a class="btn-img">
        <img src="./assets/icons/profile_img.png" alt="">
      </a>
    </div>
  </nav>

  <div class="jumbotron jumbotron--search">
    <div class="img"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 px-xs-5 px-0 px-md-5">
          <form action="/search">
            <div class="input-group mb-3">
              <img src="./assets/icons/search_btn.png">
              <input
                name="query"
                type="text"
                class="form-control"
                placeholder="Buscar pelo nome do produto"
              >
              <div class="input-group-append">
                <button class="btn" type="submit">
                  Buscar
                </button>
              </div>
            </div>
          </form>
          
          <div class="jumbotron--search__quote">
            <div class="jumbotron--search__text">
              <p>Busque produtos, compare os preços e escolha a <u>melhor opção</u></p>
            </div>
          
            <div class="jumbotron--search__icon">
              <img src="./assets/icons/arrow.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>