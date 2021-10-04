<v-row>
    <?php echo new Template('patients-management/form_tabs/plan/edit_dialog') ?>
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="6">
                <v-select v-model="patient_plan.editedItem.nutrition" :items="['Dieta', 'Se refiere a nutricionista']"
                    outlined dense>
                    <template class="black-text" #prepend>
                        <span class="black--text font-weight-bold">Nutrición</span>
                    </template>
                </v-select>
            </v-col>

            <v-col cols="6">
                <v-select v-model="patient_plan.editedItem.exercise_plan"
                    :items="['Se entrega plan de ejercicio', 'Se refiere a terapia física']" outlined dense>
                    <template class="black-text" #prepend>
                        <span class="black--text font-weight-bold">Plan de ejercicio</span>
                    </template>
                </v-select>
            </v-col>

            <v-col cols="6">
                <span class="black--text font-weight-bold">¿Se mantiene el tratamiento farmacológico previo?</span>
                <v-select v-model="patient_plan.editedItem.previous_treatments" :items="patient_plan.select"
                    @change="patient_plan.editedItem.previous_treatments == '0' ? patient_plan.edit_dialog = true : ''"
                    outlined dense>
                </v-select>
            </v-col>

            <v-col cols="6" v-if="patient_plan.editedItem.previous_treatments == '0'">
                <v-btn class="mt-6" color="primary" @click="patient_plan.treatment_edit_dialog = true" block>Editar tratamientos</v-btn>
            </v-col>

            <v-col cols="12">
                <v-row>
                    <v-col cols="12">
                        <h5 class="text-h5">Exámenes paraclínicos</h5>
                    </v-col>
                    <v-col cols="3" v-for="(clinic_exam, i) in patient_plan.editedItem.clinics_exams" :key="i">
                        <v-checkbox v-model="clinic_exam.value" :label="clinic_exam.name" color="primary" true-value="1"
                            false-value="0">
                            <template #append>
                                <v-icon color="error" @click="patient_plan.editedItem.clinics_exams.splice(i, 1)">
                                    mdi-close</v-icon>
                            </template>
                        </v-checkbox>
                    </v-col>
                    <v-col cols="3">
                        <v-text-field ref="patient_plan_clinic_exam" placeholder="Añadir otro" outlined dense>
                            <template #append>
                                <v-btn class="mr-n3" color="primary" style="margin-top: -6.3px"
                                    @click="patient_plan.editedItem.clinics_exams.push({name: $refs.patient_plan_clinic_exam.internalValue, value: '0'})"
                                    dark>
                                    Añadir
                                </v-btn>
                            </template>
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-btn color="secondary" @click="savePlan" :loading="patient_plan.save_loading" block>Guardar</v-btn>
            </v-col>
            <v-col cols="12"
                v-if="patient_plan.alreadySaved && !parseInt(patient_appointments.current_appointment.appointment_finished)">
                <v-btn color="primary" @click="finishAppointment" :loading="patient_appointments.finish_loading" block>
                    Finalizar cita</v-btn>
            </v-col>
            <?php echo new Template('patients-management/dialogs/on-save-plan') ?>
        </v-row>
    </v-col>

</v-row>