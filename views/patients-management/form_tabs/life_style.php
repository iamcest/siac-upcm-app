<v-row class="full-width">

    <v-row class="px-4">
        <v-col cols="12">
            <v-row>
                <v-col cols="12">
                    <v-row>
                        <v-col cols="12" md="6" lg="4">
                            <label class="black--text font-weight-bold">Sedentario</label>
                            <v-select v-model="patient_life_style.editedItem.sedentary"
                                :items="patient_life_style.options.select" outlined dense>
                            </v-select>
                        </v-col>
                    </v-row>
                </v-col>
                <template v-if="!parseInt(patient_life_style.editedItem.sedentary)">
                    <v-col cols="12">
                        <h5 class="text-h5 black--text">Plan de actividad física:</h5>
                    </v-col>
                    <v-col cols="12" md="6" lg="4">
                        <label class="black--text font-weight-bold">Ejercicio físico</label>
                        <v-select v-model="patient_life_style.editedItem.physical_exercise"
                            :items="patient_life_style.options.select"
                            @change="parseInt(patient_life_style.editedItem.physical_exercise)
                            ? patient_life_style.editedItem.sedentary = '0': patient_life_style.editedItem.sedentary = '1'" outlined dense>
                        </v-select>
                    </v-col>
                    <template v-if="parseInt(patient_life_style.editedItem.physical_exercise)">
                        <v-col cols="12" md="6" lg="4">
                            <label class="black--text font-weight-bold">Chequeo de inicio de actividad</label>
                            <v-select v-model="patient_life_style.editedItem.exercise_activity_before"
                                :items="patient_life_style.options.select" outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="6" lg="4"
                            v-if="parseInt(patient_life_style.editedItem.exercise_activity_before)">
                            <label class="black--text font-weight-bold">Inicio</label>
                            <v-dialog ref="exercise_start_date_dialog"
                                v-model="patient_life_style.editedItem.exercise_start_date_modal"
                                :return-value.sync="patient_life_style.editedItem.exercise_start_date" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field v-model="patient_life_style.editedItem.exercise_start_date"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" dense outlined>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="patient_life_style.editedItem.exercise_start_date" locale="es"
                                    scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary"
                                        @click="patient_life_style.editedItem.exercise_start_date_modal">
                                        Cancel
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.exercise_start_date_dialog.save(patient_life_style.editedItem.exercise_start_date)">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>
                        <v-col cols="12" md="6" lg="4">
                            <label class="black--text font-weight-bold">Tipo de ejercicio</label>
                            <v-select v-model="patient_life_style.editedItem.exercise.type"
                                :items="patient_life_style.options.exercises.type" multiple outlined dense>
                            </v-select>
                        </v-col>
                        <template v-if="patient_life_style.editedItem.exercise.type.includes('Aeróbico')">
                            <v-col cols="12" md="6" lg="4">
                            <label class=" black--text font-weight-bold">Ejercicios aeróbicos</label>
                                <v-select v-model="patient_life_style.editedItem.exercise.aerobic_exercises"
                                    :items="patient_life_style.options.exercises.aerobic" multiple outlined dense>
                                </v-select>
                            </v-col>
                            <v-col cols="12" md="6" lg="4">
                                <label class="black--text font-weight-bold">Minutos a la semana</label>
                                <v-text-field type="number"
                                    v-model="patient_life_style.editedItem.aerobic_weekly_minutes" outlined dense>
                                    <template v-if="patient_life_style.items.length > 1" #append>
                                        <v-badge class="badge-na" color="primary"
                                            :content=" returnNumberSign(Math.round(getPercentDifference('life-style').aerobic_weekly_minutes.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style').aerobic_weekly_minutes.percent)) + '%)'">
                                        </v-badge>
                                    </template>
                                </v-text-field>
                            </v-col>
                        </template>

                        <template v-if="patient_life_style.editedItem.exercise.type.includes('Resistencia')">
                            <v-col cols="12" md="6" lg="4">
                                <label class="black--text font-weight-bold">Ejercicios de resistencia</label>
                                <v-select v-model="patient_life_style.editedItem.exercise.resistance_exercises"
                                    :items="patient_life_style.options.exercises.resistance" multiple outlined dense>
                                </v-select>
                            </v-col>
                            <v-col cols="12" md="6" lg="4">
                                <label class="black--text font-weight-bold">Minutos a la semana</label>
                                <v-text-field type="number"
                                    v-model="patient_life_style.editedItem.resistance_weekly_minutes" outlined dense>
                                    <template v-if="patient_life_style.items.length > 1" #append>
                                        <v-badge class="badge-na" color="primary"
                                            :content=" returnNumberSign(Math.round(getPercentDifference('life-style').resistance_weekly_minutes.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style').resistance_weekly_minutes.percent)) + '%)'">
                                        </v-badge>
                                    </template>
                                </v-text-field>
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
                    <label class="black--text font-weight-bold">Consumo de alcohol</label>
                    <v-select v-model="patient_life_style.editedItem.alcohol_consumption"
                        :items="patient_life_style.options.select" outlined dense>
                    </v-select>
                </v-col>
                <v-col cols="12" md="6" lg="4" v-if="parseInt(patient_life_style.editedItem.alcohol_consumption)">
                    <label class="black--text font-weight-bold">Cantidad diaria</label>
                    <v-select v-model="patient_life_style.editedItem.alcohol_daily_consumption"
                        :items="patient_life_style.options.alcohol_consumption" outlined dense>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
        <?php echo new Template('patients-management/form_tabs/life-style/smoking') ?>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
        <?php echo new Template('patients-management/view_tabs/life-style/view-table') ?>
        <v-col cols="12">
            <v-btn color="secondary" @click="saveLifeStyle" :loading="patient_life_style.loading" block>Guardar
            </v-btn>
        </v-col>
    </v-row>

</v-row>