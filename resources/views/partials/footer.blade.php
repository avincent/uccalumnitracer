 </div>
        </div>
        <script>
    const ctx = document.getElementById('alumniChart').getContext('2d');
    const alumniChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Recently Added Alumni', 'Older Alumni'],
        datasets: [{
          label: 'Alumni Distribution',
          data: [3521, 4510 - 3521],
          backgroundColor: ['#4CAF50', '#2196F3'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
          title: { display: true, text: 'Alumni Distribution' }
        },
        maintainAspectRatio: false
      }
    });
  </script>
    </body>
</html>
