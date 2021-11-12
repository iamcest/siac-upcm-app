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
                <v-btn class="mt-6" color="primary" @click="patient_plan.treatment_edit_dialog = true" block>Editar
                    tratamientos</v-btn>
            </v-col>

            <v-col cols="12" md="6">
                <label class="black--text font-weight-bold">Exámenes paraclínicos</label>
                <v-select ref="clinics_exams_select" v-model="patient_plan.editedItem.clinics_exams" class="black-text"
                    :items="patient_plan.editedItem.clinics_exams" item-text="name" item-value="name" multiple
                    return-object outlined dense>
                    <template #prepend-item>
                        <v-row class="px-7">
                            <v-btn color="secondary" @click="$refs.clinics_exams_select.blur()" block>
                                Cerrar
                            </v-btn>
                        </v-row>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field ref="plan_clinic_exam_se" placeholder="Incluir otro" clearable dense
                                    outlined>
                                </v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-btn class="mt-n6" color="primary" text @click="addItemToArray(
                                    {
                                        name: $refs.plan_clinic_exam_se.internalValue,
                                        value: '1'
                                    }, 
                                    patient_plan.editedItem.clinics_exams,
                                    true
                                )">
                            <v-icon>mdi-plus-circle</v-icon>
                            Añadir
                        </v-btn>
                        <v-divider class="mt-2"></v-divider>
                    </template>
                </v-select>
            </v-col>

            <v-col cols="12" md="6">
                <label class="black--text font-weight-bold">Materiales para el paciente</label>
                <v-select ref="template_select" v-model="patient_plan.editedItem.materials" :items="filtered_templates"
                    :loading="templates_loading" item-text="material_name" return-object multiple outlined dense>

                    <template #prepend-item>
                        <v-row class="px-7">
                            <v-btn color="secondary" @click="$refs.template_select.blur()" block>
                                Cerrar
                            </v-btn>
                        </v-row>
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field v-model="template_search" placeholder="Buscar material"
                                    @input="searchTemplate" outlined></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                        <v-divider></v-divider>
                    </template>
                </v-select>
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