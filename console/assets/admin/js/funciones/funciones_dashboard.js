$(document).ready(function(){
	grafica_productos();
	grafica_ingresos();
	grafica_ordenes();
});


function grafica_productos(){
	let producto = [];
	let total = [];
	//let total1 = [];
	$.ajax({
		url: base_url+"admin/dashboard/grafica_productos_vendidos",
		method: "POST",
		success: function(data)
		{
			let obj = jQuery.parseJSON(data);

			for(let i in obj)
			{
				producto.push(obj[i].producto);
				total.push(obj[i].total);
			}
			let chartdata =
				{
					labels: producto,
					datasets : [
						{
							label: 'Cantidad',
							backgroundColor: [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)',
								'rgba(153, 102, 255, 0.2)',
								'rgba(255, 159, 64, 0.2)'
							],
							borderColor: [
								'rgba(255,99,132,1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
								'rgba(153, 102, 255, 1)',
								'rgba(255, 159, 64, 1)'
							],
							borderWidth: 0.5,
							data: total,
						}
					]
				};
			let ctx = $("#graph_productos_vendidos");

			new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
				options: {
					responsive: true,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								min: 0,
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
}

function grafica_ingresos (){
	let mes = [];
	let total = [];
	//let total1 = [];
	$.ajax({
		url: base_url+"admin/dashboard/grafica_ingreso_mes",
		method: "POST",
		success: function(data)
		{
			let obj = jQuery.parseJSON(data);

			for(let i in obj)
			{
				mes.push(obj[i].mes);
				total.push(obj[i].total);
			}
			let chartdata =
				{
					labels: mes,
					datasets : [
						{
							label: 'Venta',
							backgroundColor:'rgba(237, 85, 101, 0.5)',
							borderColor:'rgba(237, 85, 101, 1)',
							borderWidth: 1.2,
							data: total,
						}
					]
				};
			let ctx = $("#graph_ingresos_mes");
			let barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					responsive: true,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								min: 0,
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
}

function grafica_ordenes() {
	let mes = [];
	let anuladas = [];
	let finalizadas = [];
	let canceladas = [];
	$.ajax({
		url: base_url+"admin/dashboard/grafica_ordenes",
		method: "POST",
		success: function(data)
		{
			let obj = jQuery.parseJSON(data);

			for(let i in obj)
			{
				mes.push(obj[i].mes);
				anuladas.push(obj[i].anulada);
				finalizadas.push(obj[i].finalizada);
				canceladas.push(obj[i].cancelada);
			}
			let chartdata =
				{
					labels: mes,
					datasets: [{
						data: finalizadas,
						label: "Finalizadas",
						backgroundColor:'rgba(62, 148, 203, 0.2)',
						borderColor:'rgba(62,148,203,1)',
						fill: true
					}, {
						data: anuladas,
						label: "Anuladas",
						backgroundColor:'rgba(60,185,158,0.2)',
						borderColor:'rgba(60,185,158,1)',
						fill: true
					}, {
						data: canceladas,
						label: "Canceladas",
						backgroundColor:'rgba(237, 85, 101, 0.2)',
						borderColor:'rgba(237, 85, 101, 1)',
						fill: true
					}
					]
				};
			let ctx = $("#graph_ordenes_mes");
			let barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options: {
					responsive: true,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								min: 0,
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
}
