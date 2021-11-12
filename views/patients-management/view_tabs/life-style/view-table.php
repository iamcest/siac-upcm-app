<v-row class="px-4">
    <template v-if="view_dialog || dialog">

        <v-col cols="12">
            <h5 class="text-h5 text-center black--text">Registros Anteriores</h5>
        </v-col>
        <v-col cols="12">
            <v-data-table :headers="patient_life_style.headers" :items="patient_life_style.items" class="elevation-1"
                sort-by="created_at" sort-desc>
                <template #item.sedentary="{ item }">
                    <template v-if="parseInt(item.sedentary)">
                        <b>Sí.</b>
                        <template v-if="item.material.hasOwnProperty('material_name')">
                            <b>Material enviado:</b> {{ item.sedentary_material.material_name }}
                        </template>
                    </template>
                    <template v-else>
                        <b>No</b>
                    </template>
                </template>
                <template #item.exercise="{ item }">
                    <template v-if="parseInt(item.physical_exercise)">
                        <b>Sí.</b>
                        <br>
                        <b>Ejercicios:</b>
                        <span v-for="exercise, i in item.exercise.type">
                            <br>
                            - {{ exercise }}.

                            <template v-if="exercise.includes('Resistencia')">
                                <b>Tiempo semanal:</b> {{ item.resistance_weekly_minutes }} minutos
                                <template v-if="patient_life_style.items.length > 1">
                                    <v-badge class="badge-na mb-2" color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).resistance_weekly_minutes.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).resistance_weekly_minutes.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </template>
                            
                            <template v-if="exercise.includes('Aeróbico')">
                                <b>Tiempo semanal:</b> {{ item.aerobic_weekly_minutes }} minutos
                                <template v-if="patient_life_style.items.length > 1">
                                    <v-badge class="badge-na mb-2" color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).aerobic_weekly_minutes.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).aerobic_weekly_minutes.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </template>
                        </span>
                        <br>

                    </template>
                    <template v-else>
                        <b>No</b>
                    </template>
                </template>
                <template #item.alcohol_consumption="{ item }">
                    <template v-if="parseInt(item.alcohol_consumption)">
                        <b>Sí. Consumo diario:</b> {{ item.alcohol_daily_consumption }}
                    </template>
                    <template v-else>
                        <b>No</b>
                    </template>
                </template>
                <template #item.smoking="{ item }">
                    <template v-if="parseInt(item.smoking.active)">
                        <b>Sí. Cigarrillos al día:</b> {{ item.smoking.cigarettes_per_day }}
                        <template v-if="patient_life_style.items.length > 1">
                            <br>
                            <v-badge class="badge-na mb-2" color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).smoking.cigarettes_per_day.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style', {life_style: item}).smoking.cigarettes_per_day.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </template>
                    <template v-else>
                        <b>No</b>
                    </template>
                </template>
                <template #no-data>
                    No se encontraron registros
                </template>
            </v-data-table>
        </v-col>
    </template>
</v-row>