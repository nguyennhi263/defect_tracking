<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<div class="projects index large-9 medium-8 columns content">
    <canvas id="myChart" width="200" height="100"></canvas>
</div>
<script>
        var ctx = document.getElementById("myChart");
         new Chart(document.getElementById("myChart"), {
          type: 'line',
          data: {
            labels: [1,2,3,4,5,6,7,8,9,10,11,12],
            datasets: [{ 
                data: [33,0,11],
                label: "Opened",
                borderColor: "#ff6384",
                fill: false
              }, { 
                data: [11,22,88],
                label: "Closed",
                borderColor: "#8e5ea2",
                fill: false
              }
            ]
          },
          options: {
            title: {
              display: true,
              text: 'Defect opened and closed'
            }
          }
        });
</script>