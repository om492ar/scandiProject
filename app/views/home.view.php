<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="generator" content="Hugo 0.112.5">
      <title>Scandi Project Home</title>
      <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="/public/assets/css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark" onload = "getAllProduct()">
    <div class=" d-flex w-100 h-100 p-3 mx-auto flex-column ">

      <header class="mb-3">
        <div>
          <h3 class="float-md-start mb-0">Scandi</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/">Home</a>
            <a class="nav-link fw-bold py-1 px-0" href="/product/create">Add product</a>
          </nav>
        </div>
      </header>

      <main class=" p-3 mb-2 bg-light text-dark flex-wrap ">
        <h1 class="product float-md-start mb-0" >Products</h1>
        <button class="btn btn-dark  m-1 flex-wrap  mb-0 " type="button" id = "delete-product-btn" onclick="deleteProducts()" >MASS DELETE</button>
        <input class="Addbtn btn btn-dark  m-1 flex-wrap  mb-0" type="button" onclick="location.href='/product/create';" value="ADD" />
        <div class=" d-flex justify-content-center flex-wrap float-md-start mb-0 w-100  p-3 border border-dark m-1 " id="products"></div>
      </main>

    </div>

    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/home.view.js"></script>
  </body>
</html>

