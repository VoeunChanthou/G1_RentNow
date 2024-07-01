 <template>

  <div>
    <Pie
      :data="chartData"
      :options="chartOptions"
      style="background-color: white; border-radius: 5px;"
    />
  </div>

</template>

  <<script>
 import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js/auto'

ChartJS.register(ArcElement, Tooltip, Legend)
 export default {
    components: {
    Pie
  },
  data() {
    return {
      chartData: {
        labels: ['Pink', 'Gray', 'Orange', 'Purple', 'Cyan'],
        datasets: [
          {
            data: [52, 16, 6, 2, 14],
            backgroundColor: ['#FF69B4', '#808080', '#FFA500', '#800080', '#00FFFF']
          }
        ]
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },
}
  </script>