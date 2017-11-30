// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('todolist');
list.addEventListener('click', function(ev) {
    if (ev.target.tagName === 'tr') {
        ev.target.classList.toggle('checked');
    }
}, false);