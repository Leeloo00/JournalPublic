console.log('je suis dans ma console');

function getMessages(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('GET', 'handler.php');

    requeteAjax.onload = function(){
        const resultat = JSON.parse(requeteAjax.responseText);
        console.log(resultat);

        const html = resultat.map(function(message){
            return `
                <div class="container-message">
                    <div class="date">${message.created_at.substring(11,16)}</div>
                    <div class="author">${message.id_users}-</div>
                    <div class="content">${message.comment}</div>
                </div>
            `
        }).join('');
        console.log(html);

        const messages = document.querySelector('.messages');

        messages.innerHTML = html;
    }

    requeteAjax.send();
}


function postMessages(event){

    event.preventDefault();

    const author = document.querySelector('#author');
    const content = document.querySelector('#content');

    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'handler.php?task=write');
    requeteAjax.onload = function(){
        getMessages();
    }

    requeteAjax.send(data);
}

document.querySelector('form').addEventListener('submit', postMessage);