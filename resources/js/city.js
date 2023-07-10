document.addEventListener('DOMContentLoaded', () => {
    function openModal()
    {
        let modal = document.querySelector('#exampleModal3');
        if (modal != null) {
            modal = bootstrap.Modal.getOrCreateInstance(modal);
            modal.show();
        }
    }
    function getCookie() 
    {
        $.ajax({
            url: "/city",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "GET",
            success: function (response) {
                if (!response){
                    setTimeout(openModal, 1000);
                }
            },
        });
    }

    getCookie();
    
    const cities = document.querySelectorAll('.city-list a');
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
})
