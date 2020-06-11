
$('a[data-type="modal"]').on('click', function(e){
    e.preventDefault();
    let id = this.dataset.target
    $('#'+id).addClass('show')
    $('#'+id+' .modal-wrap').removeClass('zoomOut').addClass('zoomIn');
})

 $('body').on('click', '.close-icon', function(e){
	e.preventDefault();
    $('.modal.show .modal-wrap').removeClass('zoomIn').addClass('zoomOut')
    $('.modal.show').removeClass('show')
    
   
})

 