// import { default as axios } from "axios";

$(document).ready(function() {
    var panelOne = $('.form-panel.two').height(),
      panelTwo = $('.form-panel.two')[0].scrollHeight;

    $('.form-panel.two').not('.form-panel.two.active').on('click', function(e) {
      e.preventDefault();

      $('.form-toggle').addClass('visible');
      $('.form-panel.one').addClass('hidden');
      $('.form-panel.two').addClass('active');
      $('.form').animate({
        'height': panelTwo
      }, 200);
    });

    $('.form-toggle').on('click', function(e) {
      e.preventDefault();
      $(this).removeClass('visible');
      $('.form-panel.one').removeClass('hidden');
      $('.form-panel.two').removeClass('active');
      $('.form').animate({
        'height': panelOne
      }, 200);
    });

    $("#btnRegister").on('click', function(e) {
        const frmRegister = document.getElementById("frmRegister");
        const routeRegister = frmRegister.getAttribute("action");
        console.log(`route::: ${routeRegister}`);
        // console.log('formm::' + new FormData(frm))

        fetch(routeRegister, {
            method: 'POST',
            body: new FormData(frmRegister)
         })
         .then(function(response) {
            console.log('responseee')
            console.log(response)
            if(response.ok) {
                console.log('responseee OKKK')
                console.log(response)
                //return response.text()
                //window.location.href = "http://127.0.0.1:8000/home"
                $("#email").val($("#emailRegister").val());
                $("#password").val($("#passwordRegister").val());

                const frmLogin = document.getElementById("frmLogin");
                const routeLogin = frmLogin.getAttribute("action");
                fetch(routeLogin, {
                    method: 'POST',
                    body: new FormData(frmLogin)
                })
                .then(function(response) {
                    console.log("LOGIN SUCCESS");
                    window.location.href = "http://127.0.0.1:8000/home"
                })
                .catch(function(err) {
                    console.log('Error LOGIN')
                    console.log(err);
                 })
            } else {
                throw "Error en la llamada Ajax";
            }

         })
         .then(function(texto) {
            // console.log('THEN 222');
            // console.log(texto);
         })
         .catch(function(err) {
            console.log('Error')
            console.log(err);
         });

        // axios.post(route, new FormData(frm))
        // .then(response => console.log(`Response Ok::: ${response}`))
        // .catch(error => console.log(`Error::: ${error}`))
        // var url = "{{ route('user.edit', $id) }}";
	    // location.href = url;
    })
  });
