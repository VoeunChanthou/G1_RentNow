
  <template>
    <div class="card">
        <Chart type="bar" :data="chartData" :options="chartOptions" class="h-[20rem]" />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

import Chart from 'primevue/chart';


onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();
        
const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [
            {
                type: 'line',
                label: 'member',
                borderColor: documentStyle.getPropertyValue('--p-orange-500'),
                borderWidth: 2,
                fill: false,
                tension: 0.4,
                data: [50, 25, 12, 48, 56, 76, 42]
            },
            {
                type: 'bar',
                label: 'borrow',
                backgroundColor: documentStyle.getPropertyValue('--p-gray-500'),
                data: [21, 84, 24, 75, 37, 65, 34],
                borderColor: 'purple',
                borderWidth: 2
            },
            {
                type: 'bar',
                label: 'stock',
                backgroundColor: documentStyle.getPropertyValue('--p-cyan-500'),
                data: [41, 52, 24, 74, 23, 21, 32]
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');
    

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.6,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder
                }
            }
        }
    };
}
</script>

