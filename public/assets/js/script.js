function editCategory(id, name) {
    document.getElementById("edit_btn_modal").click();
    document.getElementById("id").value = id;
    document.getElementById("name").value = name;
}
function getID(id) {
    document.getElementById("delete_btn_modal").click();
    document.getElementById("removeID").value = id;
}

// function changeImage(event){
    changeImage = (e) =>{
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.getElementById("imagePreview");
            img.src = e.target.result;
            img.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
};

function addPurchase() {
    var name = document.getElementById("selectName").value;
    var category = document.getElementById("selectCategory").value;
    var image = document.getElementById("selectImage").value;
    var qty = document.getElementById("selectQty").value;
    var price = document.getElementById("selectPrice").value;
    var id = document.getElementById("selectID").value;
    if (qty == "") {
    } else {
        if (qty < 1) {
            alert("Quantity must greater than 0");
        } else {
            var check = document.getElementById("qty" + id);
            if (check) {
                var old_qty = document.getElementById("qty" + id).value;
                document.getElementById("qty" + id).value =
                    parseFloat(old_qty) + parseFloat(qty);
                document.getElementById("qty-" + id).innerHTML =
                    "Qty: " + (parseFloat(old_qty) + parseFloat(qty));
            } else {
                var div = document.createElement("div");
                div.className = "card col-3 p-2";
                div.id = "purchase" + id;
                document.getElementById("purchaseData").appendChild(div);

                var div = document.createElement("div");
                div.className = "dropdown text-end";
                div.id = "menu" + id;
                document.getElementById("purchase" + id).appendChild(div);

                var div = document.createElement("div");
                div.ariaExpanded = "false";
                div.setAttribute("data-bs-toggle", "dropdown");
                div.innerHTML = "...";
                document.getElementById("menu" + id).appendChild(div);

                var ul = document.createElement("ul");
                ul.className =
                    "dropdown-menu dropdown-menu-end dropdown-menu-arrow";
                ul.id = "ul-" + id;
                document.getElementById("menu" + id).appendChild(ul);

                var li = document.createElement("li");
                li.id = "li-" + id;
                document.getElementById("ul-" + id).appendChild(li);

                var a = document.createElement("a");
                a.className = "dropdown-item";
                a.setAttribute("onclick", "deletePurchase(" + id + ")");
                a.innerHTML = "<i class='bi bi-trash-fill'></i>Delete";
                document.getElementById("li-" + id).appendChild(a);

                var input = document.createElement("input");
                input.value = id;
                input.name = "id[]";
                input.type = "hidden";
                document.getElementById("purchase" + id).appendChild(input);

                var input = document.createElement("input");
                input.value = name;
                input.name = "name[]";
                input.type = "hidden";
                document.getElementById("purchase" + id).appendChild(input);

                var input = document.createElement("input");
                input.value = qty;
                input.name = "qty[]";
                input.id = "qty" + id;
                input.type = "hidden";
                document.getElementById("purchase" + id).appendChild(input);

                var img = document.createElement("img");
                img.src = "http://localhost:8000/images/" + image;
                img.className = "w-50";
                img.setAttribute("style", "margin: auto");
                document.getElementById("purchase" + id).appendChild(img);

                var h5 = document.createElement("h5");
                h5.innerHTML = "Name: " + name;
                document.getElementById("purchase" + id).appendChild(h5);

                var h5 = document.createElement("h5");
                h5.innerHTML = "Price: " + price;
                document.getElementById("purchase" + id).appendChild(h5);

                var h5 = document.createElement("h5");
                h5.innerHTML = "Qty: " + qty;
                h5.id = "qty-" + id;
                document.getElementById("purchase" + id).appendChild(h5);
            }
        }
        document.getElementById("selectQty").value = "";
    }
}

function deletePurchase(id) {
    document.getElementById("purchase" + id).remove();
}
function itemProduct(id, name, price,qty,img) {
    return `
        <div class="row m-2">
            <div class="col-6 bg-dark">
                <img src="../images/${img}" class="w-100">
            </div>
            <div class="col-6">
                <h5>${name}</h5>
                <p>$${price}</p>
                <input type="hidden" name="id[]" value="${id}">
                <input type="hidden" name="name[]" value="${name}">
                <input type="hidden" name="price[]" value="${price}">
                <div class="input-group">
                    <button type="button" onclick="decrement('${id}')">-</button>
                    <input type="text" name="qty[]" id="quantity-${id}" class="form-control" value="${qty}" readonly>
                    <button type="button" onclick="increment('${id}')">+</button>
                </div>
            </div>    
        </div>
    `;
}

function decrement(id){
    for(i=0;i<ProductNames.length;i++){
        if(id == ProductID[i]){
            if(ProductQty[i] >1){
                ProductQty[i]--;
            }else{
                ProductID.splice(i,1);
                ProductNames.splice(i,1);
                ProductImages.splice(i,1);
                ProductPrice.splice(i,1);
                ProductQty.splice(i,1);
            }
            document.getElementById('currentOrder').innerHTML = items();
        }
    }
}
function increment(id){
    for(i=0;i<ProductNames.length;i++){
        if(id == ProductID[i]){
            ProductQty[i]++;
            document.getElementById('currentOrder').innerHTML = items();
        }
    }
}

const ProductNames = [];
const ProductImages = [];
const ProductID = [];
const ProductQty = [];
const ProductPrice = [];
function addPurchaseItem(name, id, image ,price) {
    var index = ProductNames.length;
    for(i=0;i<ProductNames.length;i++){
        if(id == ProductID[i]){
            ProductQty[i]++;
            document.getElementById('currentOrder').innerHTML = items();
            return;
        }
    }

        ProductNames[index] = name;
        ProductID[index] = id;
        ProductImages[index] = image;
        ProductQty[index] = 1;
        ProductPrice[index] = price;

    document.getElementById('currentOrder').innerHTML = items();
}

function items(){
    let subtotal = 0;
    let discount = 0;
    let amount = 0;
    for(i=0;i<ProductNames.length;i++){
        let total = ProductPrice[i] * ProductQty[i];
        subtotal += total;
    }

    if(subtotal<5000) discount = 0;
    else if(subtotal <10000) discount = 10;
    else if(subtotal <15000) discount = 15;
    else if(subtotal <20000) discount = 20;

    amount = subtotal - ((subtotal*discount)/100) + (subtotal*0.05);
    document.getElementsByName('subtotal')[0].value = subtotal;
    document.getElementsByName('discount')[0].value = discount;
    document.getElementsByName('amount')[0].value = amount;
    document.getElementById('subtotal').innerHTML = "<b>"+subtotal.toLocaleString()+"$</b?";
    document.getElementById('discount').innerHTML = "<b>"+discount+"%</b?";
    document.getElementById('amount').innerHTML = "<b>"+amount.toLocaleString()+"$</b?";
    var item = "";
        for(i=0;i<ProductNames.length;i++){
            item += itemProduct(ProductID[i],ProductNames[i],ProductPrice[i],ProductQty[i],ProductImages[i]);
        }
        return item;
}

