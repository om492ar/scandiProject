function getAllProduct(){
     fetch('/findAll',
      {
        "method": "POST",
      })
      .then(function(response) {
        return response.json()
      }).then(function(products){
        console.log(products);
        if(products){
          for(let product_item of products) {
            var sku = product_item.SKU;
            var name = product_item.name;
            var price = product_item.price+" $";
            var attributes_value = product_item.attributes_value;
            var checkbox = product_item.id;
            document.getElementById("products").innerHTML +=`<div class='product p-5 border border-dark m-3'><input class="delete-checkbox" id="product_item.id" type="checkbox" name="products" value="${checkbox}" ><p>${sku}</p> <p>${name}</p> <p>${price}</p> <p>${attributes_value}</p></div> `;
          }
        }
      })
}

function deleteProducts(){
    const productCheckboxes = document.querySelectorAll("input[type='checkbox'][name='products']");
    const checkedCheckboxes = [];
    for (const checkbox of productCheckboxes) {
        if (checkbox.checked) {
            checkedCheckboxes.push(checkbox.value);
        }
    }
    fetch('/delete',
      {
        "method": "POST",
        body: JSON.stringify(checkedCheckboxes)
      })
      .then(function(response) {
        return response.text()
       
      }).then(function(data){
        location.reload();
      })
}



