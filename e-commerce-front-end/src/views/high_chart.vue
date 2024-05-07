<!-- Move the script block to the end of the file -->
<template>
    <div id="app">
        <div class="title-row">
            <p>Set the chart title here:</p>
            <input type="text" v-model="title" placeholder="highchart">
        </div>
        <highcharts :options="chartOptions"></highcharts>
    </div>
</template>

<script>
export default {
  name: 'high_chart',
  data() {
    return {
      chartOptions: {
        chart: {
          type: 'spline'
        },
        title: {
          text: 'Entire title'
        },
        series: [{
          data: [10, 0, 8, 2, 6, 4, 5, 5]
        }]
      },
      title: ''
    }
  },
  watch: {
    title(newValue) {
      if (newValue === '') {
        this.chartOptions.title.text = 'Entire title'
      } else {
        this.chartOptions.title.text = newValue
      }
    }
  },
  mounted() {
    this.loadCSVData();
  },
  methods: {
    async loadCSVData() {
      try {
        const response = await axios.get('path/to/your/csv/file.csv');
        const csvData = response.data;
        const parsedData = this.parseCSVData(csvData);
        this.chartOptions.series = parsedData;
      } catch (error) {
        console.error('Error loading CSV data:', error);
      }
    },
    parseCSVData(csvData) {
      // Parse the CSV data and return an array of series data
      // Example: return [{ name: 'Series 1', data: [1, 2, 3, 4, 5] }, ...]
    }
  }

};


</script>
