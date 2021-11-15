$(document).ready(() => {
	
    $('#documentacao').on('click', ()=> {
       // $('#pagina').load('documentacao.html')
       /* 
            $.get('documentacao.html', data => {
                $('#pagina').html(data)
            })
        */
       
        $.post('documentacao.html', data => {
            $('#pagina').html(data)
        })

    })

    $('#suporte').on('click', ()=> {
      //  $('#pagina').load('suporte.html')
        /*   
        $.get('suporte.html', data => {
            $('#pagina').html(data)
        })
        */

        $.post('suporte.html', data => {
            $('#pagina').html(data)
        })
    })

    //ajax 
    $('#competencia').on('change', e => {

        let competencia = $(e.target).val()

        $.ajax({
            type: 'GET',
            url: 'app.php',
            data: `competencia=${competencia}`,//síntese: x-www-form-urlencoded
            dataType: 'json',
            success:  (dados) => {

                $('#numeroVendas').html(dados.numeroVendas),
                $('#totalVendas').html(dados.totalVendas),
                $('#clientesAtivos').html(dados.clientesAtivos)
                $('#clientesInativos').html(dados.clientesInativos)
                $('#totalDespesas').html(dados.totalDespesas)





            },
            error: (erro) => {console.log(erro)}
        })

        //métodos, url, dados, sucesso, erro

    })


})