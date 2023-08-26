var attributes= [];
function typeFunction(){
    attributes= [];
    sel = document.getElementById("productType");
    let type= [sel.options[sel.selectedIndex].value];
    fetch('/product/getAttribute',
    {
        "method": "POST",
        body: JSON.stringify(type)
    })
    .then(function(response) {
        return response.text()
    }).then(function(data){
        var data_js = JSON.parse(data);
        type_id = (data_js[0].type_id);
        document.getElementById("attributes").innerHTML = "";
        for (var item of data_js) {
            item.value = "";
            attributes.push({item});
            document.getElementById("attributes").innerHTML+="<div class='form-label'>"+"<label>"+item.name+"</label>"+"<input class='form-control' type='text' id="+item.name+" />"+"</div>";
        }
       switch (type_id) {
        case DVD: 
            document.getElementById("attributes").innerHTML +=`<p>Please, provide size</p>`;
        break;
        case Furniture: 
            document.getElementById("attributes").innerHTML +=`<p>Please, provide dimensions</p>`;
        break;
        case Book:
            document.getElementById("attributes").innerHTML +=`<p>Please, provide weight</p>`;
        break;
       }

    })
}

function sendData(){
    let data = {};
    data.SKU=document.getElementById("sku").value;
    data.name=document.getElementById("name").value;
    data.price=document.getElementById("price").value;
    sel = document.getElementById("productType");
    data.type_name=sel.options[sel.selectedIndex].id;
    data.type_id= sel.options[sel.selectedIndex].value;
    for(var attribute of attributes){
        attributevalue=attribute.item;
        attributevalue.value = document.getElementById(attribute.item.name).value;
    }
    data.attributes = attributes;
    console.log(data);
    fetch('/product/add',
    {
        "method": "POST",
        body: JSON.stringify(data)
    })
    .then(function(response) {
        return response.text()
    }).then(function(data){
        let response = JSON.parse(data);
        if(response.message == "success"){
            location.href = "/";          
        }
        if(response.message == "fail"){
            document.getElementById("validate").innerHTML = "Please, submit required data";
            for(let key in response.errors ){
                document.getElementById("validate").innerHTML+="<label class='form-control  bg-warning'>"+response.errors[key]+"</label>"+"<br/>";
            }  
        }
    }
    )
}