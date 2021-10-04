<?php echo new Template('patients-management/form_tabs/risk-factors/old-rf') ?>
<?php echo new Template('patients-management/form_tabs/risk-factors/new-rf') ?>
<v-row class="mt-12">
    <v-col cols="12">
        <h4 class="text-center text-h5 grey--text text--darken-2">Seleccione la fórmula de cálculo de riesgo</h4>
    </v-col>
    <v-col class="px-6" cols="12">
        <v-select v-model="patient_risk_factors.selectedForm" :items="patient_risk_factors.form_risk_factors"
            item-text="calc_name" placeholder="Seleccione la fórmula para el cálculo de riesgo"
            @change="assignGeneralVars" return-object outlined dense></v-select>
    </v-col>

    <?php echo new Template('patients-management/form_tabs/calculations/find-risk') ?>
    <?php echo new Template('patients-management/form_tabs/calculations/oms-ops-risk') ?>
    <?php echo new Template('patients-management/form_tabs/calculations/inter-heart') ?>
    <?php echo new Template('patients-management/form_tabs/calculations/heart-risk-framingham') ?>
    <v-col class="d-flex justify-center" cols="12"
        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_risk_factors.risk_factors_calc_list.length > 1 && patient_risk_factors.selectedForm.calc_name != 'Riesgo OMS/OPS'">
        <v-badge class="ml-n14" color="primary"
            :content=" returnNumberSign(Math.round(getPercentDifference('risk-factor-calc').calc.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('risk-factor-calc').calc.percent)) + '%)'">
        </v-badge>
    </v-col>
    <v-col class="d-flex justify-center mt-2" cols="12" md="4" offset-md="4"
        v-if="patient_risk_factors.selectedForm.calc_name != '' && patient_risk_factors.selectedForm.obj.results != ''">
        <v-btn class="secondary white--text" v-on:click="saveFactorRisk()" :loading="patient_risk_factors.loading">
            Guardar Cálculo
        </v-btn>
    </v-col>
    <v-col cols="12">
        <v-btn color="primary white--text" block @click="tab = 'tab-11';initializePlans()">
            Ir a siguiente pestaña
        </v-btn>
    </v-col>
</v-row>