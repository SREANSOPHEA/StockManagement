function editCategory(id,name){
    document.getElementById('edit_btn_modal').click();
    document.getElementById('id').value = id;
    document.getElementById('name').value = name;
}
function getID(id){
    document.getElementById('delete_btn_modal').click();
    document.getElementById('removeID').value = id;
}