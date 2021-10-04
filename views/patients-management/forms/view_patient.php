<v-tabs class="patient-tabs" v-model="view_tab" show-arrows fixed-tabs>

    <v-tab class="font-weight-bold" href="#tab-view-1">
        Información general
    </v-tab>

    <v-tab class="font-weight-bold" href="#tab-view-2" @click="initializeAppointments">
        Citas
    </v-tab>
    <template v-if="patient_appointments.appointments.length > 0">

        <v-tab class="font-weight-bold" href="#tab-view-3" @click="initializeHistory">
            Antecedentes
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-4" @click="initializeAnthropometry">
            Antropometría
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-5" @click="initializeVitalSigns">
            Signos Vitales
        </v-tab>


        <v-tab class="font-weight-bold" href="#tab-view-6" @click="initializePhysicalExams">
            Examen Físico
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-7" @click="initializeElectroCardiograms">
            Electro Cardiograma
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-8" @click="initializeEchocardiograms">
            Ecocardiograma
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-9" @click="initializeExams();initializeExamsFiles()">
            Exámenes de <br>laboratorio
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-10" @click="initializeFactorsRisk(true)">
            Diagnósticos
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-view-11" @click="initializePlans">
            Plan
        </v-tab>

    </template>

</v-tabs>
<v-tabs-items v-model="view_tab">
    <?php $i = 0; ?>
    <?php foreach ($tabs['tabs'] as $tab_item): ?>
    <?php $i++; ?>
    <v-tab-item transition="scroll-y-reverse-transition" :value="'tab-view-<?php echo $i;?>'">
        <v-container fluid>

            <v-row>
                <?php echo new Template('patients-management/view_tabs/'. $tab_item, ['access' => $access]) ?>
            </v-row>

        </v-container>
    </v-tab-item>
    <?php endforeach ?>
</v-tabs-items>