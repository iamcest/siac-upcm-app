<h5 class="text-h5 text-center black--text">Registros Anteriores</h5>
<v-data-table :headers="views.patient_anthropometry.headers" :items="patient_anthropometry.history" class="elevation-1"
    sort-by="created_at" sort-desc>
    <template #item.weight="{ item }">
        {{ item.weight }} {{ item.weight_suffix }}
        <template v-if="patient_anthropometry.history.length > 1">
            <br>
            <v-badge color="primary"
                :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).weight.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).weight.percent)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #item.height="{ item }">
        {{ item.height }} {{ item.height_suffix }}
        <template v-if="patient_anthropometry.history.length > 1">
            <br>
            <v-badge color="primary"
                :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).height.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).height.percent)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #item.abdominal_waist="{ item }">
        {{ item.abdominal_waist }} {{ item.abdominal_waist_suffix }}
        <template v-if="patient_anthropometry.history.length > 1">
            <br>
            <v-badge color="primary"
                :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).abdominal_waist.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).abdominal_waist.percent)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #item.bmi="{ item }">
        {{ getBMI(item.weight, item.height, item.weight_suffix, item.height_suffix).replace(' kg/m2', '') }} kg/m<sup>2</sup>
        <template v-if="patient_anthropometry.history.length > 1">
            <br>
            <v-badge color="primary"
                :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).bmi.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).bmi.percent).toFixed(2)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #item.corporal_surface="{ item }">
        {{ getCS(item.weight, item.height, item.weight_suffix, item.height_suffix).replace(' m2', '') }} m<sup>2</sup>
        <template v-if="patient_anthropometry.history.length > 1">
            <br>
            <v-badge color="primary"
                :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).cs.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).cs.percent).toFixed(2)) + '%)'">
            </v-badge>
        </template>
    </template>
    <template #no-data>
        No se encontraron registros
    </template>
</v-data-table>