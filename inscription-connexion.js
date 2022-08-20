var login = document.getElementById('login');
var connect = document.getElementById('connect');

var inscription = document.getElementById('inscription');
var connexion = document.getElementById('connexion');

connect.addEventListener('click',
 function(){
    console.log('You cliked on me ?')
    connexion.style.display = 'block';
    inscription.style.display = 'none';
 })

 
login.addEventListener('click',
function(){
   console.log('You cliked on me ?')
   connexion.style.display = 'none';
   inscription.style.display = 'block';
})