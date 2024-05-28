function editCategory(id,name){
    document.getElementById('edit_btn_modal').click();
    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
}
function getID(id){
    document.getElementById('delete_btn_modal').click();
    document.getElementById('removeID').value = id;
}
document.getElementById('imageInput').addEventListener('change', function(event) {
    var input = event.target;

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var img = document.getElementById('imagePreview');
            img.src = e.target.result;
            img.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
});