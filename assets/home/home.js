import $ from 'jquery';
import axios from 'axios';

$(function () {
    $.ajax(
        {
            url: 'https://127.0.0.1:8000/api/v1/pokemons/',
            type: 'get',
            dataType: 'json',
            beforeSend: function () {
                $('#content-loader').show();
                $('#loader').show();
            },
            complete: function () {
                $('#loader').hide();
                $('#content-loader').hide();
            },
            success: function (resp) {
                for (let x of resp.results) {
                    axios.get('https://pokeapi.co/api/v2/pokemon-form/' + x.name + '/')
                        .then((resp) => {
                            $('#listofpokemos').append(crearCarta(resp.data));
                        }
                        )
                        .catch((error) => {
                            console.log(error);
                        }
                        );
                }
            }
        }
    );

});

function crearCarta(object) {
    const div = document.createElement('div');
    const divbody = document.createElement('div');
    const p = document.createElement('p');
    const a = document.createElement('a');
    const h1 = document.createElement('h1');
    const img = document.createElement('img');

    div.classList.add('card');
    div.classList.add('shadow');
    div.classList.add('mb-2')
    img.classList.add('card-img-top');
    divbody.classList.add('card-body');
    h1.classList.add('cart-title');
    p.classList.add('card-text');
    a.classList.add('link');

    img.setAttribute('src', object.sprites.front_default)
    h1.innerHTML = object.name;
    p.innerHTML = 'ID: ' + object.id;
    a.setAttribute('href', '#');
    a.innerHTML = object.url;
    divbody.appendChild(img);
    divbody.appendChild(h1);
    divbody.appendChild(p);
    divbody.appendChild(a);
    div.appendChild(divbody);


    return div;
}

$('#btnSeachPokemon').on('click', function () {
    var pokemon_name = $('#search_pokemon').val();
    axios.get('https://127.0.0.1:8000/api/v1/pokemons/' + pokemon_name)
        .then(
            (resp) => {
                var img = resp.data.sprites.other;
                $('#imgPokemonFrontView').attr('src', img.dream_world.front_default);
            }
        )
        .catch(
            (resp) => {
                console.log(resp)
            }
        );
});


$('#view-user-profile').on('click',()=>{
    console.log(getDomain());
   
});


$('#test-mailer').on('click', () => {
    $.ajax({
        type: 'GET',
        url: 'https://127.0.0.1:8000/mail/test/notification/send',
        dataType: 'text',
        success: function(resp){
            alert(resp);
        }
    });
})