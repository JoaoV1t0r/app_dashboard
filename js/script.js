$(document).ready(() => {
	$('#documentacao').on('click', () => {
		/*$('#pagina').load('documentacao.html')
		$.get('documentacao.html', data => {
			$('#pagina').html(data)
		})
		*/
		$.post('documentacao.html', data => {
			$('#pagina').html(data)
		})
	})

	$('#suporte').on('click', () => {
		/*
		$('#pagina').load('suporte.html')
		$.get('suporte.html', data => {
			$('#pagina').html(data)
		})
		*/
		$.post('suporte.html', data => {
			$('#pagina').html(data)
		})
	})

	//Chamada Ajax
	$('#competencia').on('change', e => {
		let competencia = $(e.target).val()

		$.ajax({
			type: 'GET',
			url: `app.controller.php`,
			data: `competencia=${competencia}`,
			dataType: 'json',
			success: dados => {
				$('#numeroVendas').html(dados.numeroVendas)
				$('#totalVendas').html(dados.totalVendas)
				$('#clientesAtivos').html(dados.clientesAtivos)
				$('#clientesInativos').html(dados.clientesInativos)
				$('#elogios').html(dados.elogios)
				$('#reclamacoes').html(dados.reclamacoes)
				$('#sugestoes').html(dados.sugestoes)
				$('#despesas').html(dados.despesas)
				console.log(dados)
				
			},
			erro: erro => {console.log(erro)}
		})
	})
})