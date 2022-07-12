// let gridCard = document.querySelectorAll('.grid-card');
// gridCard.forEach(card => {
//     let actionsDropdown = card.querySelector('.grid-card__admin-actions').querySelector('button');
//     actionsDropdown.addEventListener('click', function(e) {
//         e.preventDefault();
//         let dropdownMenu = e.target.parentNode.querySelector('.actions-menu');
//         if(dropdownMenu.classList.contains('hidden')) {
//             dropdownMenu.classList.remove('hidden')
//         } else {
//             dropdownMenu.classList.add('hidden')
//         }
//     })
// });
let gridCard = $(".grid-card");
gridCard.each(function() {
    let card = $(this);
    let actionsDropdown = card.find('> .grid-card__admin-actions button');
    actionsDropdown.on('click', function(e) {
        e.preventDefault();
        let actionsMenu = $(e.target).parent().find('.actions-menu');
        actionsMenu.hasClass('hidden') ? actionsMenu.removeClass('hidden') : actionsMenu.addClass('hidden');
    })
})

// TODO Add Delete Prompt on Delete Action
// let url = "http://127.0.0.1:8000/admin/users/1";
let deleteButton = $('.delete');
deleteButton.each(function() {
    let deleteLink = $(this);
    let actionsMenu = deleteLink.parent().parent();
    let record = deleteLink.attr('record');
    let recordID = deleteLink.attr('record-id');
    let item = deleteLink.attr('person')
    deleteLink.on('click', function(e) {
        e.preventDefault();
        $.confirm({
            title: `You are deleting a ${record}.`,
            content: `Are you sure you want to delete ${item} from the system?`,
            theme: 'modern',
            animation: 'scale',
            buttons: {
                yes: function() {
                    window.location.href = `/admin/${record}/delete-` + recordID;
                },
                no: function () { 
                    $.alert("User hasn't been deleted");
                }
            },
            onDestroy: function () {
                setTimeout(function() {
                    actionsMenu.hasClass('hidden') ? actionsMenu.removeClass('hidden') : actionsMenu.addClass('hidden');
                }, 500);
            }
        });
    })
})