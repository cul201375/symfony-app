import $ from 'jquery';
import axios from 'axios'

$(function(){
    $.ajax(
        {
            url: 'http://127.0.0.1:8000/api/v1/pokemons/',
            type: 'get',
            dataType: 'json',
            beforeSend: function() {
                $('#loader').show();
             },
             complete: function(){
                $('#loader').hide();
             },
             success: function(resp) {
                 $('#listofpokemos').text(JSON.stringify(resp));
                 console.log(resp);                 
                 for (let x of resp.results) {
                    console.log(x);
                    const card = document.createElement('div');
                    card.classList.add('card');
                    card.innerHTML = x.name;
                  }
             }
        }
    );
    axios.get('http://127.0.0.1:8000/api/v1/pokemons/')
    .then(
        (resp) => {
            console.log('esto es el axios');
        }
    )
    .catch(
        (error) => {
            console.log(error);
        }
    );
});

$('#btnSeachPokemon').on('click', function(){
    var pokemon_name = $('#search_pokemon').val();
    axios.get('http://127.0.0.1:8000/api/v1/pokemons/'+pokemon_name)
    .then(
        (resp) => {
            var img = resp.data.sprites.other; 
            $('#imgPokemonFrontView').attr('src', img.dream_world.front_default);
            console.log(img);
        }
    )
    .catch(
        (resp) => {
            console.log(resp)
        }
    );
});