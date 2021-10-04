<v-col cols="12">
    <v-dialog v-model="patient_laboratory_exams.dialogDelete" max-width="1200px">
        <v-card>
            <v-card-title class="headline">Estás seguro de que quieres eliminar este examen de laboratorio?
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeExamDelete">Cancelar</v-btn>
                <v-btn color="blue darken-1" text @click="deleteExamItemConfirm">Continuar</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <v-row>
        <v-col cols="12">
            <h3 class="text-center text-h5 mb-4 mt-5">Archivos </h3>
            <v-data-table :headers="patient_laboratory_exams.exam_files_headers"
                :items="patient_laboratory_exams.exam_files" sort-by="exam_date" sort-desc
                class="elevation-1 full-width">
                <template #item.action="{ item }">
                    <v-row class="mx-auto">
                        <v-icon large color="red" @click="deleteExamFileItem(item)">
                            mdi-trash-can
                        </v-icon>
                    </v-row>
                </template>
                <template #item.file_result="{ item }">
                    <a :href="'<?php echo SITE_URL ?>/public/exam-files/'+item.file_result"
                        target="_blank">{{ item.file_result }}</a>
                </template>
                <template #body.append v-if="!patient_laboratory_exams.dialogFileDelete">
                    <tr>
                        <td class="py-6">
                            <v-dialog ref="exam_file_date_dialog" v-model="patient_laboratory_exams.file_modal"
                                :return-value.sync="patient_laboratory_exams.editedFileItem.exam_date" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field v-model="patient_laboratory_exams.editedFileItem.exam_date"
                                        append-icon="mdi-calendar" label="Fecha" hint="Ingrese la fecha del examen"
                                        readonly v-bind="attrs" v-on="on" dense></v-text-field>
                                </template>
                                <v-date-picker v-model="patient_laboratory_exams.editedFileItem.exam_date" locale="es"
                                    scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="patient_laboratory_exams.file_modal = false">
                                        Cancelar
                                    </v-btn>
                                    <v-btn text color="primary"
                                        @click="$refs.exam_file_date_dialog.save(patient_laboratory_exams.editedFileItem.exam_date);">
                                        OK
                                    </v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </td>
                        <td class="py-6">
                            <v-file-input v-model="patient_laboratory_exams.editedFileItem.file_result" label="Archivo"
                                accept="application/pdf" hint="Ingrese los resultados con un archivo pdf"
                                persistent-hint></v-file-input>
                        </td>
                        <td class="py-6">
                            <v-btn class="secondary white--text" @click="saveFileExam"
                                :loading="patient_laboratory_exams.add_file_loading">Añadir</v-btn>
                        </td>
                    </tr>
                </template>
                <template #no-data>
                    No se encontraron resultados de archivos
                </template>
            </v-data-table>
        </v-col>
        <v-col cols="12" md="6">
            <v-data-table :headers="patient_laboratory_exams.headers" :items="patient_laboratory_exams.exams"
                class="elevation-1 full-width" :options="patient_laboratory_exams.table_options" hide-default-footer>
                <template #item.action="{ item }">
                    <v-row class="mx-auto">
                        <v-icon large color="primary" @click="showExamResults(item)">
                            mdi-plus
                        </v-icon>
                    </v-row>
                </template>
                <template #top>
                    <v-dialog v-model="patient_laboratory_exams.dialogFileDelete" max-width="1200px">
                        <v-card>
                            <v-card-title class="headline">Estás seguro de que quieres eliminar este archivo?
                            </v-card-title>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="closeFileExamDelete">Cancelar</v-btn>
                                <v-btn color="blue darken-1" text @click="deleteExamFileItemConfirm">Continuar</v-btn>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </template>
                <template #item.action="{ item }">
                    <v-row class="mx-auto">
                        <v-icon large color="primary" @click="showExamInfo(item)">
                            mdi-plus
                        </v-icon>
                    </v-row>

                </template>
                <template #no-data>
                    <v-btn color="primary" @click="initializeExams">
                        Recargar
                    </v-btn>
                </template>
            </v-data-table>
        </v-col>
        <v-col cols="12" md="6" v-if="patient_laboratory_exams.laboratory_exam">
            <h3 class="text-center text-h5 mb-4">Resultados de {{ patient_laboratory_exams.selectedExam.name }}</h3>
            <v-row>
                <v-col cols="12">
                    <v-data-table :headers="patient_laboratory_exams.exam_headers"
                        :items="patient_laboratory_exams.exam_results" sort-by="exam_date" sort-desc
                        class="elevation-1 full-width">
                        <template #item.results="{ item }">
                            {{ item.results }}
                            <template v-if="patient_laboratory_exams.selectedExam.nomenclature == 'mm3'">
                              mm<sup>3</sup>
                            </template>
                            <template v-else>
                                {{ patient_laboratory_exams.selectedExam.nomenclature }}
                            </template>
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_laboratory_exams.exam_results.length > 1">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item}).exam.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item}).exam.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </template>
                        <template #item.action="{ item }">
                            <v-row class="mx-auto">
                                <v-icon large color="red" @click="deleteExamItem(item)">
                                    mdi-trash-can
                                </v-icon>
                            </v-row>
                        </template>
                        <template #body.append v-if="!patient_laboratory_exams.dialogDelete">
                            <tr>
                                <td class="py-6">
                                    <v-dialog ref="exam_date_dialog" v-model="patient_laboratory_exams.modal"
                                        :return-value.sync="patient_laboratory_exams.editedItem.exam_date"
                                        width="290px">
                                        <template #activator="{ on, attrs }">
                                            <v-text-field v-model="patient_laboratory_exams.editedItem.exam_date"
                                                append-icon="mdi-calendar" label="Fecha de examen"
                                                hint="Ingrese la fecha del examen" readonly v-bind="attrs" v-on="on"
                                                dense></v-text-field>
                                        </template>
                                        <v-date-picker v-model="patient_laboratory_exams.editedItem.exam_date"
                                            locale="es" scrollable>
                                            <v-spacer></v-spacer>
                                            <v-btn text color="primary" @click="patient_laboratory_exams.modal = false">
                                                Cancelar
                                            </v-btn>
                                            <v-btn text color="primary"
                                                @click="$refs.exam_date_dialog.save(patient_laboratory_exams.editedItem.exam_date)">
                                                OK
                                            </v-btn>
                                        </v-date-picker>
                                    </v-dialog>
                                </td>
                                <td class="py-6" ref="pl_result_input">
                                    <v-text-field v-model="patient_laboratory_exams.editedItem.results"
                                        label="Resultados del examen" hint="Ingrese los resultados del examen" dense>
                                        <template #append>
                                          <template v-if="patient_laboratory_exams.selectedExam.nomenclature == 'mm3'">
                                            mm<sup>3</sup>
                                          </template>
                                          <template v-else>
                                            {{ patient_laboratory_exams.selectedExam.nomenclature }}
                                          </template>
                                        </template>
                                    </v-text-field>
                                </td>
                                <td class="py-6">
                                    <v-btn class="secondary white--text" @click="saveExam">Añadir</v-btn>
                                </td>
                            </tr>
                        </template>
                        <template #no-data>
                            No se encontraron resultados de exámenes
                        </template>
                    </v-data-table>
                </v-col>
                <v-col cols="12">
                    <?php echo new Template('patients-management/form_tabs/calculations/colesterol-ldl') ?>
                </v-col>
                <v-col cols="12">
                    <?php echo new Template('patients-management/form_tabs/calculations/colesterol-no-hdl') ?>
                </v-col>
                <v-col class="" cols="12">
                    <?php echo new Template('patients-management/form_tabs/calculations/filt_glom') ?>
                </v-col>
                <v-col class="" cols="12">
                    <?php echo new Template('patients-management/form_tabs/calculations/egfr_mdr-ckdepi') ?>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <v-btn color="primary white--text" block @click="tab = 'tab-10';initializeFactorsRisk()">
                Ir a siguiente pestaña
            </v-btn>
        </v-col>
    </v-row>
</v-col>