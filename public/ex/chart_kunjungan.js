var ctx = document.getElementById("piechart");
	var piechart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Dalam antrian", "Antrian Terlewat", "Selesai"],
			datasets: [{
				label: 'pie Chart',
                backgroundColor: [
					'rgb(255, 99, 132)',
					'rgb(255, 159, 64)',
					'#03a9f4',
				],
				data: [10, 20, 30]
            }]
		},
		options: {
			responsive: true
		}
	});