const closeModal = document.querySelector('.close-modal');
const modal = document.querySelector('.modal');

if (modal != null || modal != undefined ){
    closeModal.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
}


