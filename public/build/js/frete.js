$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.aberturaFrete,.chegadaCliente, .saidaCliente,.fechamentoFrete').on('click',function () {

        if (navigator.geolocation) {


            navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
        }
        else {
            yqlgeo.get('visitor', normalize_yql_response);
        }


        function handle_errors(error) {

            switch (error.code) {
                case error.PERMISSION_DENIED:

                    alert("Permissão negada pelo navegador!");
                    break;

                case error.POSITION_UNAVAILABLE:
                    alert("Não conseguimos encontrar sua localização");

                    break;

                case error.TIMEOUT:
                    alert("Erro ao tentar te localizar o tempo de busca esgotou.");

                    break;

                default:
                    alert("Erro desconhecido. Chama o administrador do sistema.");

                    break;
            }
        }

        function normalize_yql_response(response) {
            if (response.error) {
                var error = {code: 0};
                handle_error(error);
                return;
            }

            var position = {

                coords: {
                    latitude: response.place.centroid.latitude,
                    longitude: response.place.centroid.longitude
                },
                address: {
                    city: response.place.locality2.content,
                    region: response.place.admin1.content,
                    country: response.place.country.content
                }
            };

            handle_geolocation_query(position);
        }

        function handle_geolocation_query(position) {
            var src_mapa = "https://maps.googleapis.com/maps/api/staticmap?sensor=false&center=" + position.coords.latitude + "," +
                position.coords.longitude + "&zoom=14&size=140x140&markers=color:blue|label:S|" +
                position.coords.latitude + ',' + position.coords.longitude + "&key=AIzaSyDxQZuypz7a_tl3H_AfEIICPl0CQdqqHHg";

            $('.longitude').val(position.coords.longitude);
            $('.latitude').val(position.coords.latitude);

            $('.imagemMapa').attr('src',src_mapa);
            $('.mapa').val(src_mapa);

            $('.sucesso').removeClass('hide').fadeIn(1000);

        }
    });

    //js abertura do frete
    $('#formFreteAbertura').submit(function (event) {
        event.preventDefault();
        var idFrete = $('#frete_id').val();


        var $form = $(this),
            data = $form.serialize(),
            url = '/frete/frete-abertura';

        var posting = $.post(url,{formData: data});
        posting.done(function (data) {
            if(data.fail){
                alert('Deu um erro. Por favor contate o webmaster!')
            }
            if(data.success) {
                $('.salvarSucesso').removeClass('hide').fadeIn(1000);
                setTimeout(function (){$('.salvarSucesso').hide('fast')}, 4000);
                $('.aberturaFrete').addClass('disabled');
                $('.cardFreteAbertura').removeClass('bg-inativo').addClass('bg-cinza');
                $('.iconFreteAbertura').removeClass('fa-square-o').addClass('fa-check-square-o');
                $('.chegadaCliente').removeClass('disabled');
                $('#aberturaFrete').modal('hide');
                $('#aberturaFrete').empty();

            }
        });
    });

    //js chegada no cliente
    $('#formFreteChegadaCliente').submit(function (event) {
        event.preventDefault();

        var $form = $(this),
            data = $form.serialize(),
            url = '/frete/frete-chegada';
        console.log(data);

        var posting = $.post(url,{formData: data});
        posting.done(function (data) {
            if(data.fail){
                alert('Deu um erro. Por favor contate o webmaster!')
            }
            if(data.success) {

                $('.salvarSucesso').removeClass('hide').fadeIn(1000);
                setTimeout(function (){$('.salvarSucesso').hide('fast')}, 4000);
                $('.chegadaCliente').addClass('disabled');
                $('.saidaCliente').removeClass('disabled');
                $('.cardChegadaCliente').removeClass('bg-inativo').addClass('bg-cinza');
                $('.iconFreteChegadaCliente').removeClass('fa-square-o').addClass('fa-check-square-o');
                $('#chegadaCliente').modal('hide');
                $('#chegadaCliente').empty();


            }
        });
    })

    $('#formFreteSaidaCliente').submit(function (event) {
        event.preventDefault();

        var $form = $(this),
            data = $form.serialize(),
            url = '/frete/frete-saida';

        var posting = $.post(url,{formData: data});
        posting.done(function (data) {
            if(data.fail){
                alert('Deu um erro. Por favor contate o webmaster!')
            }
            if(data.success) {

                $('.salvarSucesso').removeClass('hide').fadeIn(1000);
                setTimeout(function (){$('.salvarSucesso').hide('fast')}, 4000);
                $('.saidaCliente').addClass('disabled');

                $('.cardSaidaCliente ').removeClass('bg-inativo').addClass('bg-cinza');
                $('.iconFreteSaidaCliente').removeClass('fa-square-o').addClass('fa-check-square-o');
                $('#saidaCliente').modal('hide');
                $('#saidaCliente').empty();
                $('.fechamentoFrete').removeClass('disabled');
            }
        });
    });

    $('#formFechamentoFrete').submit(function (event) {
        event.preventDefault();

        var $form = $(this),
            data = $form.serialize(),
            url = '/frete/frete-fechamento';

        var posting = $.post(url,{formData: data});
        posting.done(function (data) {
            if(data.fail){
                alert('Deu um erro. Por favor contate o webmaster!')
            }
            if(data.success) {

                $('.salvarSucesso').removeClass('hide').fadeIn(1000);
                setTimeout(function (){$('.salvarSucesso').hide('fast')}, 4000);
                $('.saidaCliente').addClass('disabled');

                $('.cardFechamentoFrete ').removeClass('bg-inativo').addClass('bg-cinza');
                $('.iconFreteFechamento').removeClass('fa-square-o').addClass('fa-check-square-o');
                $('#fechamentoFrete').modal('hide');
                $('#fechamentoFrete').empty();
                $('.fechamentoFrete').addClass('disabled');

                // aqui vou coloca o botao pra finalizar :D $('.fechamentoFrete').removeClass('disabled');
            }
        });
    })

});