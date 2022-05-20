import $ from 'jquery';
import axios from 'axios'

$('#Prueba').on('click', function(){
    axios.get('https://pokeapi.co/api/v2/pokemon/ditto').then((resp) => {console.log(resp)}).catch((resp) => {console.log(resp)});
});