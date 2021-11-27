<h4 class="text-h6 mb-6">
    <b>Paciente:</b>
    {{ comparison.<?= $item == 'current_patient' ? 'patient_selected' : $item ?>.full_name }}
</h4>
<v-data-table :headers="[{ text: 'Resultado', value: 'results', align: 'center', width: 'auto' }]"
    :items="comparison.laboratory_exams.<?= $item ?>" class="elevation-1 full-width" hide-default-footer>
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
                :content=" returnNumberSign(Math.round(getPercentDifference('laboratory-exam', 
                {item: item, patient_to_compare: <?= $patient_to_compare ?>}, true).exam.numeric))  
                + ' (' + returnNumberSign(Math.round(getPercentDifference('laboratory-exam', 
                {item: item, patient_to_compare: <?= $patient_to_compare ?>}, true).exam.percent)) + '%)'"
                v-if="comparison.laboratory_exams.<?= $item == 'current_patient' ? 'patient_to_compare' : $item ?>[0] !== undefined">
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