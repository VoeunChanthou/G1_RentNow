 <template>

  <div>
    <Pie
      :data="chartData"
      :options="chartOptions"
      style="background-color: white; border-radius: 5px;"
    />
  </div>

</template>

  <script>
 import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js/auto'

ChartJS.register(ArcElement, Tooltip, Legend)
 export default {
    components: {
    Pie
  },
  props: ['info', 'incom', 'countBorrow'],
  data() {
    return {
      chartData: {
        labels: ['incom', 'borrowed', 'product', 'member'],
        datasets: [
          {
            data: [this.incom, this.countBorrow, this.info.product, this.info.countMember],
            backgroundColor: ['#FF69B4', '#808080', '#FFA500', '#800080']
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