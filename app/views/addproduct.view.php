<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Scandi Project Add Product</title>
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/assets/css/cover.css" rel="stylesheet">
  </head>

  <body class="d-flex h-200 text-center text-bg-dark">

    <div class="cover-container d-flex w-200 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div>
            <h3 class="float-md-start mb-0">Scandi</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
              <a id="button1" class="nav-link fw-bold py-1 px-0" href="/">Home</a>
              <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/product/create">Add product</a>
            </nav>
          </div>
        </header>
        
        
        <main class="container p-3 mb-2 bg-light text-dark flex-wrap">

            <h2 class="product float-md-start mb-0">Product Add</h2>
            <button class="btn btn-dark  m-1 flex-wrap  mb-0 " type="button" onclick="sendData()" >Save</button>
            <input class="Addbtn btn btn-dark  m-1 flex-wrap  mb-0" type="button" onclick="location.href='/';" value="Cancel" />
          
            <div class=" d-flex justify-content-center flex-wrap float-md-start mb-0 w-100  p-3 border border-dark m-1 ">

            <div class="" id = "validate"></div>
            <form id="product_form" class="row g-3" method="POST" onsubmit="return false;">
              <div class="col-md-6">
                <label for="SKU" class="form-label">SKU:</label>
                <input type="text" name="SKU" id="sku" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" id="price" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="productType" id="Type" class="form-label">Product Type:</label>
                <select id="productType" class="form-control" onchange="typeFunction()">
                  <option  value="" name="select">Select a type</option>
                  <option value="1" name="DVD" id="DVD">DVD</option>
                  <option value="2" name="Furniture" id="Furniture">Furniture</option>
                  <option value="3" name="Book" id="Book">Book</option>
                </select>
              </div>
              <div class="col-12">
                <div class="justify-content-center" id="attributes"></div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100 py-2" onclick="sendData()">Save</button>
              </div>
            </form>
            </div>
        </main>

    </div>

      <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/public/assets/js/addproduct.view.js"></script>
  </body>
</html>