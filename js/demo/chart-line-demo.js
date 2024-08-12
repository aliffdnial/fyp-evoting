function changeChart(color, label, labels, data){
	chartzz.data.datasets[0].backgroundColor = color;
	chartzz.data.datasets[0].borderColor = color;
	chartzz.data.datasets[0].label = label;
	chartzz.data.labels = labels;
	chartzz.data.datasets[0].data = data;
	chartzz.update()			
}

const ctx1 = document.getElementById("chartzz");
const chartzz = new Chart(ctx1, {
type: 'line',
data: {
	labels: ['1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
	datasets: [{
	label: "Power Consumption:Day",
	data: [0, 1000, 20000, 1500, 2500, 35000, 3000, 4000, 5000, 4500, 55000, 7000, 6000, 6500, 8500, 30000, 8000, 9000, 9500, 10000, 10500, 30000, 20000, 25000, 35000, 45000, 40000, 55000, 50000, 60000],
	backgroundColor:'rgba(78, 115, 223, 1)',
	borderColor:'rgba(78, 115, 223, 1)',
	borderWidth: 1
	}]
},
	options: {
	scales: {
		y: {
			beginAtZero: true
		}
	}
}
});

