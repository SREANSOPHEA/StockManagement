function editCategory(id, name) {
    document.getElementById("edit_btn_modal").click();
    document.getElementById("id").value = id;
    document.getElementById("name").value = name;
}
function getID(id) {
    document.getElementById("delete_btn_modal").click();
    document.getElementById("removeID").value = id;
}
document
    .getElementById("imageInput")
    .addEventListener("change", function (event) {
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
    });

function addPurchase(){
    var name = document.getElementById('selectName').value;
    var category = document.getElementById('selectCategory').value;
    var image = document.getElementById('selectImage').value;
    var qty = document.getElementById('selectQty').value;
    var price = document.getElementById('selectPrice').value;
    var id = document.getElementById('selectID').value;
    if(qty == ""){

    }else{
        if(qty <1 ){
            alert('Quantity must greater than 0');
        }else{
            var check = document.getElementById('qty'+id);
            if(check){
                var old_qty = document.getElementById('qty'+id).value;
                document.getElementById('qty'+id).value = parseFloat(old_qty)+parseFloat(qty);
                document.getElementById('qty-'+id).innerHTML = "Qty: "+(parseFloat(old_qty)+parseFloat(qty));
            }else{
                var div = document.createElement('div');
                div.className = "card col-3 p-2";
                div.id = "purchase"+id;
                document.getElementById('purchaseData').appendChild(div);
        
                var div = document.createElement('div');
                div.className = "dropdown text-end";
                div.id = "menu"+id;
                document.getElementById('purchase'+id).appendChild(div);

                var div = document.createElement('div');
                div.ariaExpanded = "false";
                div.setAttribute('data-bs-toggle','dropdown');
                div.innerHTML = "...";
                document.getElementById('menu'+id).appendChild(div);

                var ul = document.createElement('ul');
                ul.className = "dropdown-menu dropdown-menu-end dropdown-menu-arrow";
                ul.id = "ul-"+id;
                document.getElementById('menu'+id).appendChild(ul);

                var li = document.createElement('li');
                li.id= "li-"+id;
                document.getElementById('ul-'+id).appendChild(li);

                var a = document.createElement('a');
                a.className= "dropdown-item";
                a.setAttribute('onclick','deletePurchase('+id+')');
                a.innerHTML = "<i class='bi bi-trash-fill'></i>Delete";
                document.getElementById('li-'+id).appendChild(a);

                var input = document.createElement('input');
                input.value = id;
                input.name = "id[]";
                input.type = "hidden";
                document.getElementById('purchase'+id).appendChild(input);

                var input = document.createElement('input');
                input.value = name;
                input.name = "name[]";
                input.type = "hidden";
                document.getElementById('purchase'+id).appendChild(input);
    
                var input = document.createElement('input');
                input.value = qty;
                input.name = "qty[]";
                input.id = "qty"+id;
                input.type = "hidden";
                document.getElementById('purchase'+id).appendChild(input);
    
                var img = document.createElement('img');
                img.src = "http://localhost:8000/images/"+image;
                img.className = "w-50";
                img.setAttribute('style','margin: auto');
                document.getElementById('purchase'+id).appendChild(img);

                var h5 = document.createElement('h5');
                h5.innerHTML = "Name: "+name;
                document.getElementById('purchase'+id).appendChild(h5);

                var h5 = document.createElement('h5');
                h5.innerHTML = "Price: "+price;
                document.getElementById('purchase'+id).appendChild(h5);

                var h5 = document.createElement('h5');
                h5.innerHTML = "Qty: "+qty;
                h5.id = 'qty-'+id;
                document.getElementById('purchase'+id).appendChild(h5);
            }
        }
        document.getElementById('selectQty').value = "";
    }
    
}

function deletePurchase(id){
    document.getElementById('purchase'+id).remove();
}


function addPurchaseItem(name,id){
    alert(name);
}
