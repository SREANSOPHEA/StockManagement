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
            }else{
                var div = document.createElement('div');
                div.className = "card col-3 p-2";
                div.id = "purchase"+id;
                document.getElementById('purchaseData').appendChild(div);
        
                var div = document.createElement('div');
                div.className = "dropdown-menu";
                div.id = "menu"+id;
                document.getElementById('purchaseData').appendChild(div);

                var input = document.createElement('input');
                input.value = name;
                input.name = "name[]";
                document.getElementById('purchase'+id).appendChild(input);
    
                var input = document.createElement('input');
                input.value = qty;
                input.name = "qty[]";
                input.id = "qty"+id;
                document.getElementById('purchase'+id).appendChild(input);
    
                var img = document.createElement('img');
                img.src = "http://localhost:8000/images/"+image;
                document.getElementById('purchase'+id).appendChild(img);
            }
        }
        document.getElementById('selectQty').value = "";
    }
    
}