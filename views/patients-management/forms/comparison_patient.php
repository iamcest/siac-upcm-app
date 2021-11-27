<v-tabs class="patient-tabs" v-model="view_comparison_tab" show-arrows fixed-tabs>

    <template v-if="patient_appointments.appointments.length > 0 || viewPatientsAverageComparisonDialog">

        <v-tab class="font-weight-bold" href="#tab-comparison-3" @click="initializeComparisonHistory">
            Antecedentes
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-4" @click="initializeComparisonAnthropometry(false)">
            Antropometría
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-5" @click="initializeComparisonVitalSigns">
            Signos Vitales
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-6" @click="initializeComparisonPhysicalExams">
            Examen Físico
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-7" @click="initializeComparisonElectroCardiogram">
            Electro Cardiograma
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-8" @click="initializeComparisonEchocardiograms">
            Ecocardiograma
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-9" @click="initializeExams">
            Exámenes de <br>laboratorio
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-10" @click="initializeComparisonFactorsRisk(true)">
            Diagnósticos
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-comparison-12" @click="initializeComparisonPlans" v-if="1 == 2">
            Plan
        </v-tab>

    </template>

</v-tabs>
<v-tabs-items v-model="view_comparison_tab">
    <?php $i = 0; ?>
    <?php foreach ($data['tabs'] as $tab_item): ?>
    <?php $i++; ?>
    <v-tab-item transition="scroll-y-reverse-transition" :value="'tab-comparison-<?= $i?>'">
        <v-container fluid>

            <v-row v-if="view_comparison_tab == 'tab-comparison-<?= $i?>'">
                <?= new Template('patients-management/view_comparison_tabs/'. $tab_item) ?>
            </v-row>

        </v-container>
    </v-tab-item>
    <?php endforeach ?>
</v-tabs-items>