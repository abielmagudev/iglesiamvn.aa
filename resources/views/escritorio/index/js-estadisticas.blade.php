<script>

const pieIndicadoresTempo = document.getElementById('pieIndicadoresTempo')

new Chart(pieIndicadoresTempo, {
	type: 'pie',
	data: JSON.parse(pieIndicadoresTempo.dataset.chartSetup),
	options: {
		cutoutPercentage: 25
	}
}).resize(384,384)

</script>
