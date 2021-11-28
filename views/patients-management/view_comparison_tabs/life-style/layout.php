<v-row class="px-4" v-if="comparison.life_style.<?= $item ?>.hasOwnProperty('exercise')">
    <v-col cols="12">
        <h4 class="text-center text-h5 mb-4">
            Paciente:
            {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
        </h4>
    </v-col>
    <v-col cols="12">
        <v-row>
            <v-col cols="12">
                <v-col cols="12" md="6" lg="4"><span class="font-weight-bold">Sendetario:
                        <span class="black--text">
                            <template v-if="parseInt(comparison.life_style.<?= $item ?>.sedentary)">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </span>
                </v-col>
            </v-col>
            <template v-if="!parseInt(comparison.life_style.<?= $item ?>.sedentary)">
                <v-col cols="12">
                    <h5 class="text-h5 black--text">Plan de actividad física:</h5>
                </v-col>
                <v-col cols="12" md="6" lg="4">
                    <span class="font-weight-bold">Ejercicio físico:
                        <span class="black--text">
                            <template v-if="parseInt(comparison.life_style.<?= $item ?>.physical_exercise)">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </span>
                </v-col>

                <template v-if="parseInt(comparison.life_style.<?= $item ?>.physical_exercise)">

                    <v-col cols="12" md="6" lg="4">
                        <span class="font-weight-bold">Chequeo de inicio de actividad:
                            <span class="black--text">
                                <template v-if="parseInt(comparison.life_style.<?= $item ?>.exercise_activity_before)">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </span>
                        </span>
                    </v-col>
                    <v-col cols="12" md="6" lg="4"
                        v-if="parseInt(comparison.life_style.<?= $item ?>.exercise_activity_before)">
                        <span class="font-weight-bold">Inicio:
                            <span class="black--text">
                                {{ comparison.life_style.<?= $item ?>.exercise_start_date }}
                            </span>
                        </span>
                    </v-col>
                    <v-col cols="12" md="6" lg="4">
                        <span class="font-weight-bold">Tipo de ejercicio:
                            <br>
                            <span class="black--text"
                                v-for="(exercise_type, i) in comparison.life_style.<?= $item ?>.exercise.type" :key="i">
                                - {{ exercise_type }} <br>
                            </span>
                        </span>
                    </v-col>
                    <template v-if="comparison.life_style.<?= $item ?>.exercise.type.includes('Aeróbico')">
                        <v-col cols="12" md="6" lg="4">
                            <span class="font-weight-bold">Ejercicios aeróbicos:
                                <br>
                                <span class="black--text"
                                    v-for="(exercise, i) in comparison.life_style.<?= $item ?>.exercise.aerobic_exercises"
                                    :key="i">
                                    - {{ exercise }} <br>
                                </span>
                                <br>
                                <span class="font-weight-bold">Minutos a la semana:
                                    <span class="black--text">
                                        {{ comparison.life_style.<?= $item ?>.aerobic_weekly_minutes }} minutos
                                        <template v-if="
                                            comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('exercise')
                                            &&
                                            comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.exercise.type.includes('Aeróbico')
                                            ">
                                            <br>
                                            <v-badge color=" primary"
                                                :content="
                                                returnNumberSign(Math.round(getPercentDifference('life-style', 
                                                {patient_to_compare: <?= $patient_to_compare ?>}, true).aerobic_weekly_minutes.numeric))  
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style', 
                                                {patient_to_compare: <?= $patient_to_compare ?>}, true).aerobic_weekly_minutes.percent)) + '%)'">
                                            </v-badge>
                                        </template>
                                    </span>
                                </span>
                            </span>
                        </v-col>
                    </template>

                    <template v-if="comparison.life_style.<?= $item ?>.exercise.type.includes('Resistencia')">
                        <v-col cols="12" md="6" lg="4">
                            <span class="font-weight-bold">Ejercicios de resistencia:
                                <br>
                                <span class="black--text"
                                    v-for="exercise, i in comparison.life_style.<?= $item ?>.exercise.resistance_exercises"
                                    :key="i">
                                    - {{ exercise }} <br>
                                </span>
                                <br>
                                <span class="font-weight-bold">Minutos a la semana:
                                    <span class="black--text">
                                        {{ comparison.life_style.<?= $item ?>.resistance_weekly_minutes }} minutos
                                        <template v-if="
                                            comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('exercise')
                                            &&
                                            comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.exercise.type.includes('Resistencia')
                                            ">
                                            <br>
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('life-style', 
                                                {patient_to_compare: <?= $patient_to_compare ?>}, true).resistance_weekly_minutes.numeric))  
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style', 
                                                {patient_to_compare: <?= $patient_to_compare ?>}, true).resistance_weekly_minutes.percent)) + '%)'">
                                            </v-badge>
                                        </template>
                                    </span>
                                </span>
                            </span>
                        </v-col>
                    </template>

                </template>
            </template>

        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
    <v-col cols="12">
        <v-row>
            <v-col cols="12" md="6" lg="4">
                <span class="font-weight-bold">Consumo de alcohol:
                    <span class="black--text">
                        <template v-if="comparison.life_style.<?= $item ?>.alcohol_consumption">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </span>
            </v-col>
            <v-col cols="12" md="6" lg="4" v-if="parseInt(comparison.life_style.<?= $item ?>.alcohol_consumption)">
                <span class="font-weight-bold">Cantidad diaria:
                    <span class="black--text">
                        {{ comparison.life_style.<?= $item ?>.alcohol_daily_consumption }}
                    </span>
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
    <?php echo new Template('patients-management/view_comparison_tabs/life-style/partials/smoking', $data) ?>
</v-row>
<v-row v-else>

    <v-col cols="12">
        <p class="text-center">No se encontró información</p>
    </v-col>

</v-row>