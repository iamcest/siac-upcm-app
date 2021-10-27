<v-row class="full-width">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="12">
                <v-row>
                    <v-col cols="12" md="6" lg="4">
                        <label class="black--text font-weight-bold">Ejercicio físico</label>
                        <v-select v-model="patient_life_style.editedItem.physical_exercise"
                            :items="patient_life_style.options.select" outlined dense>
                        </v-select>
                    </v-col>
                    <template v-if="parseInt(patient_life_style.editedItem.physical_exercise)">
                        <v-col cols="12" md="6" lg="4">
                            <label class="black--text font-weight-bold">Tipo de ejercicio</label>
                            <v-select v-model="patient_life_style.editedItem.exercise.type"
                                :items="patient_life_style.options.exercises.type" multiple outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="6" lg="4" v-if="patient_life_style.editedItem.exercise.type.includes('Aeróbico')">
                            <label class="black--text font-weight-bold">Ejercicios aeróbicos</label>
                            <v-select v-model="patient_life_style.editedItem.exercise.aerobic_exercises"
                                :items="patient_life_style.options.exercises.aerobic" multiple outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="6" lg="4"
                            v-if="patient_life_style.editedItem.exercise.type.includes('Resistencia')">
                            <label class="black--text font-weight-bold">Ejercicios de resistencia</label>
                            <v-select v-model="patient_life_style.editedItem.exercise.resistance_exercises"
                                :items="patient_life_style.options.exercises.resistance" multiple outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="6" lg="4">
                            <label class="black--text font-weight-bold">Minutos a la semana</label>
                            <v-text-field type="number" v-model="patient_life_style.editedItem.exercise_weekly_minutes"
                                outlined dense>
                            </v-text-field>
                        </v-col>
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
                <v-btn color="secondary" @click="saveLifeStyle" :loading="patient_life_style.loading" block>Guardar
                </v-btn>
            </v-col>
        </v-row>
    </v-col>

</v-row>