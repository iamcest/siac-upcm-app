<?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
<v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-9'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-col cols="12">
    <v-row>
        <v-col cols="12">
            <h3 class="text-center text-h5 mb-4 mt-5">Archivos </h3>
            <v-data-table :headers="views.patient_laboratory_exams.exam_file_headers"
                :items="patient_laboratory_exams.exam_files" sort-by="exam_date" sort-desc
                class="elevation-1 full-width">
                <template #item.file_result="{ item }">
                    <a :href="'<?php echo SITE_URL ?>/public/exam-files/'+item.file_result"
                        target="_blank">{{ item.file_result }}</a>
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
            <h3 class="text-center text-h5 mb-4">Resultados de
                {{ patient_laboratory_exams.selectedExam.name }}</h3>
            <v-data-table :headers="views.patient_laboratory_exams.exam_headers"
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
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item}).exam.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item}).exam.percent)) + '%)'"
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_laboratory_exams.exam_results.length > 1">
                    </v-badge>
                </template>
                <template #no-data>
                    No se encontraron resultados de exámenes
                </template>
            </v-data-table>
        </v-col>
    </v-row>
</v-col>