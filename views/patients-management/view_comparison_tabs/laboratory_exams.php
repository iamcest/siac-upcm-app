<template v-if="viewPatientsComparisonDialog">
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
                            <?= new Template('patients-management/view_comparison_tabs/laboratory-exams/layout', 
                                [
                                    'item' => 'current_patient',
                                    'patient_to_compare' => 'false'
                                ]
                            ) ?>
                        </v-col>
                        <v-col cols="12" md="6">
                            <?= new Template('patients-management/view_comparison_tabs/laboratory-exams/layout', 
                                [
                                    'item' => 'patient_to_compare',
                                    'patient_to_compare' => 'true'
                                ]
                            ) ?>
                        </v-col>
                    </v-row>
                </v-col>
            </template>

        </v-row>
    </v-col>
</template>