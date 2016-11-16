window.onload = function() {

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
            position.coords.longitude + "&zoom=14&size=300x400&markers=color:blue|label:S|" +
            position.coords.latitude + ',' + position.coords.longitude + "&key=AIzaSyDxQZuypz7a_tl3H_AfEIICPl0CQdqqHHg";

        $('#longitude').val(position.coords.longitude);
        $('#latitude').val(position.coords.latitude);
        $('#mapa').val(src_mapa);

        $('.sucesso').removeClass('hide').fadeIn(1000);

    }
}