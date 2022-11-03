var login = document.getElementById('login');
var connect = document.getElementById('connect');

var inscription = document.getElementById('inscription');
var connexion = document.getElementById('connexion');

connect.addEventListener('click',
 function(){
   //  console.log('You cliked on me ?')
    connexion.style.display = 'block';
    inscription.style.display = 'none';
    login.style.backgroundColor = 'rgba(88, 27, 82, 0.3)';
    connect.style.backgroundColor = 'rgb(199, 3, 180, 0.3)';
 })

 
login.addEventListener('click',
function(){
   // console.log('You cliked on me ?')
   connexion.style.display = 'none';
   inscription.style.display = 'block';
   login.style.backgroundColor = 'rgb(199, 3, 180, 0.3)';
   connect.style.backgroundColor = 'rgba(88, 27, 82, 0.3)';
})