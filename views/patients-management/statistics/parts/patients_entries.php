<v-row class="d-flex justify-center">
    <v-col cols="12">
        <h3 class="text-h5 text-center">
            Pacientes Atendidos
        </h3>
    </v-col>
    <v-col cols="12" md="6" v-show="!statistics.chart.loading">
        <h4 class="d-block text-h5 text-center">Mensual</h4>
        <line-chart ref="monthly_chart" :chartData="statistics.chart.monthly_data"></line-chart>
    </v-col>
    
    <v-col cols="12" md="6" v-show="!statistics.chart.loading">
        <h4 class="d-block text-h5 text-center">Semanal</h4>
        <line-chart ref="weekly_chart" :chartData="statistics.chart.weekly_data"></line-chart>
    </v-col>
</v-row>