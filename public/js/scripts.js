let gridCard = document.querySelectorAll('.grid-card');
gridCard.forEach(card => {
    let actionsDropdown = card.querySelector('.grid-card__admin-actions').querySelector('button');
    actionsDropdown.addEventListener('click', function(e) {
        e.preventDefault();
        let dropdownMenu = e.target.parentNode.querySelector('.actions-menu');
        if(dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.remove('hidden')
        } else {
            dropdownMenu.classList.add('hidden')
        }
    })
});