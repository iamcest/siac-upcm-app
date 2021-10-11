
<v-tabs ref="edit_tabs" class="patient-tabs" v-model="tab" show-arrows fixed-tabs>
    
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])): ?>
        <v-tab class="font-weight-bold" href="#tab-1" @click="general_save = true">
            Información general
        </v-tab>

        <v-tab class="font-weight-bold" href="#tab-2" @click="initializeAppointments">
            Citas
        </v-tab>

        <template v-if="patient_appointments.appointments.length > 0">
            <v-tab class="font-weight-bold" href="#tab-3" @click="initializeHistory">
                Antecedentes
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-4" @click="initializeAnthropometry">
                Antropometría
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-5" @click="initializeVitalSigns">
                Signos Vitales
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-6" @click="initializePhysicalExams">
                Examen Físico
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-7" @click="initializeElectroCardiograms">
                Electro Cardiograma
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-8" @click="initializeEchocardiograms">
                Ecocardiograma
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-9" @click="initializeExams();initializeExamsFiles()">
                Exámenes de <br>laboratorio
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-10" @click="initializeFactorsRisk">
                Diagnósticos
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-11" @click="initializeLifeStyle">
                Estilo de vida
            </v-tab>

            <v-tab class="font-weight-bold" href="#tab-12" @click="initializePlans">
                Plan
            </v-tab>
        </template>
    <?php endif ?>
    <?php if (empty($can_manage_suite) && !empty($access['patient_management_access']['sections'][0]['permissions']['create']) 
    && empty($access['patient_management_access']['sections'][0]['permissions']['update']) ) : ?>
        <v-tab class="font-weight-bold" href="#tab-1" @click="general_save = true">
            Información general
        </v-tab>
    <?php endif ?>
    <?php if (empty($can_manage_suite) && !empty($access['patient_management_access']['sections'][1]['permissions']['update'])
    && empty($access['patient_management_access']['sections'][0]['permissions']['update']) ) : ?>
        <v-tab class="font-weight-bold" href="#tab-2" @click="initializeAppointments">
            Citas
        </v-tab>
    <?php endif ?>
</v-tabs>
<v-tabs-items v-model="tab">
    <?php $i = 0; ?>
    <?php foreach ($tabs['tabs'] as $tab_item): ?>
    <?php $i++; ?>
    <v-tab-item transition="scroll-y-reverse-transition" :value="'tab-<?php echo $i;?>'">
        <v-container fluid>

            <v-row>
                <?php echo new Template('patients-management/form_tabs/'. $tab_item) ?>
            </v-row>

        </v-container>
    </v-tab-item>
    <?php endforeach ?>
</v-tabs-items>