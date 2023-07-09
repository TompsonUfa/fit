const cities = document.querySelectorAll('.city__item a');
for (let i = 0; i < cities.length; i++){
    const city = cities[i];
    const cityId = city.dataset.cityId
    city.addEventListener('click', function(event){
        event.preventDefault();
        $.ajax({
            url: "/city",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            data: {
                cityId: cityId,
            },
            success: function (response) {
                window.location.replace(city.href);
            },
        });
    });
}