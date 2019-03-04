//client side validation
window.onload = function(){
const deleteList = document.querySelectorAll(".deleteList");
const deleteMe = document.getElementById("deleteMe");

$('#deleteModal').on('show.bs.modal', function () {
    for(let i = 0; i < deleteList.length; i ++){
    deleteMe.addEventListener('click', function(e){
        deleteList[i].removeAttribute('data-toggle');
        deleteList[i].removeAttribute('data-target');
        $('#deleteModal').modal( 'hide' ).data( 'bs.modal', null );
        return true;
    });
}
});
}




