const flashMessages = {

    init: function()
    {
        console.log('flashMessages.js OK');

        const buttonForDeleteMessage = document.querySelector('.delete');
        buttonForDeleteMessage.addEventListener('click', flashMessages.handleMessagesDelete);

    },

    handleMessagesDelete: function(evt)
    {
        const messageButton = evt.currentTarget;
        const elementButton = messageButton.closest('.message');
        elementButton.style.display = 'none';

    }
}