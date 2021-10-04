<template v-if="viewPatientsComparisonDialog && comparison.patient_selected.hasOwnProperty('patient_id')">
    <v-col cols="12">
        <v-row>
            <v-col cols="12" :md="comparison.laboratory_exams.examsListed ? 4 : 6">
                <v-data-table :headers="patient_laboratory_exams.headers" :items="patient_laboratory_exams.exams"
                    class="elevation-1 full-width" :options="patient_laboratory_exams.table_options"
                    hide-default-footer>
                    <template #item.action="{ item }">
                        <v-row class="mx-auto">
                            <v-icon large color="primary" @click="showComparisonExamResults(item)">
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
            <template v-if="comparison.laboratory_exams.examsListed">
                <v-col cols="8">
                    <v-row>
                        <v-col cols="12">
                            <h3 class="text-center text-h5 mb-4">Resultados de
                                {{ comparison.laboratory_exams.selectedExam.name }}</h3>
                        </v-col>
                        <v-col cols="12" md="6">
                            <h4 class="text-h6 mb-6"><b>Paciente:</b>
                                {{  comparison.patient_selected.full_name }}
                            </h4>
                            <v-data-table
                                :headers="[{ text: 'Resultado', value: 'results', align: 'center', width: 'auto' }]"
                                :items="comparison.laboratory_exams.current_patient" class="elevation-1 full-width"
                                hide-default-footer>
                                <template #item.results="{ item }">
                                    <template v-if="item !== undefined">
                                        {{ item.results }}
                                        <template v-if="comparison.laboratory_exams.selectedExam.nomenclature == 'mm3'">
                                            mm<sup>3</sup>
                                        </template>
                                        <template v-else>
                                            {{ comparison.laboratory_exams.selectedExam.nomenclature }}
                                        </template>
                                        <v-badge color="primary"
                                            :content=" returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item, patient_to_compare: false}, true).exam.numeric))  
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item, patient_to_compare: false}, true).exam.percent)) + '%)'"
                                            v-if="comparison.laboratory_exams.patient_to_compare[0] !== undefined">
                                        </v-badge>
                                    </template>
                                    <template v-else>
                                        No se encontraron resultados
                                    </template>
                                </template>
                                <template #no-data>
                                    No se encontraron resultados de exámenes
                                </template>
                            </v-data-table>
                        </v-col>
                        <v-col cols="12" md="6">
                            <h4 class="text-h6 mb-6"><b>Paciente:</b>
                                {{  comparison.patient_to_compare.full_name }}
                            </h4>
                            <v-data-table
                                :headers="[{ text: 'Resultado', value: 'results', align: 'center', width: 'auto' }]"
                                :items="comparison.laboratory_exams.patient_to_compare" class="elevation-1 full-width"
                                hide-default-footer>
                                <template #item.results="{ item }">
                                    <template v-if="item !== undefined">
                                        {{ item.results }} 
                                        <template v-if="comparison.laboratory_exams.selectedExam.nomenclature == 'mm3'">
                                            mm<sup>3</sup>
                                        </template>
                                        <template v-else>
                                            {{ comparison.laboratory_exams.selectedExam.nomenclature }}
                                        </template>
                                        {{ comparison.laboratory_exams.selectedExam.nomenclature }}
                                        <v-badge color="primary"
                                            :content=" returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item, patient_to_compare: true}, true).exam.numeric))  
                                            + ' (' + returnNumberSign(Math.round(getPercentDifference('laboratory-exam', {item: item, patient_to_compare: true}, true).exam.percent)) + '%)'"
                                            v-if="comparison.laboratory_exams.current_patient[0] !== undefined">
                                        </v-badge>
                                    </template>
                                    <template v-else>
                                        No se encontraron resultados
                                    </template>
                                </template>
                                <template #no-data>
                                    No se encontraron resultados de exámenes
                                </template>
                            </v-data-table>
                        </v-col>
                    </v-row>
                </v-col>
            </template>

        </v-row>
    </v-col>
</template>