<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5">ANTIHIPERTENSIVOS</h3>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">IECAS</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.iecas.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.iecas.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.iecas.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'iecas'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'iecas'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.iecas.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.iecas.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.iecas.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.iecas.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.iecas.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'iecas'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'iecas'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.iecas.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">BRA</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.bra.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.bra.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.bra.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'bra'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'bra'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.bra.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.bra.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.bra.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.bra.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.bra.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'bra'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'bra'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.bra.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Ca antagonista</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ca.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ca.dosis }} mg</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ca.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ca'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ca'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ca.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ca.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ca.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ca.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ca.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ca'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ca'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ca.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Diurético</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'diuretic'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'diuretic'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'diuretic'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'diuretic'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.diuretic.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Inhibidores Renina</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ir.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ir.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ir.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ir'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ir'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ir.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ir.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ir.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ir.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ir.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ir'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ir'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ir.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Beta bloq</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'block_beta'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'block_beta'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'block_beta'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'block_beta'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.block_beta.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">ARNI</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.arni.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.arni.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.arni.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'arni'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'arni'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.arni.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.arni.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.arni.secondary_effects }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.arni.daily_dosis }} </span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.arni.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'arni'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'arni'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.arni.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Ant. MINERALOCORTICOIDES</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.treatment }} </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.dosis }}</span>
                <br>
                <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ant_mineralocorticoids'}, patient_to_compare: true}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'hta', treatment: 'ant_mineralocorticoids'}, patient_to_compare: true}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.daily_dosis }} </span>
                <br>
                <template
                    v-if="comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ant_mineralocorticoids'}, patient_to_compare: true}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'hta', treatment: 'ant_mineralocorticoids'}, patient_to_compare: true}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.patient_to_compare.history_content.diseases.hta.ant_mineralocorticoids.frecuency }} </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-row class="d-flex justify-center">
            <v-col cols="12" md="4" lg="3">
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">
                        <template v-if="comparison.history.patient_to_compare.history_content.diseases.hta.fdc.active">
                            El paciente tiene indicada una combinación fija de los medicamentos seleccionados
                        </template>
                        <template v-else>
                            El paciente no tiene indicada una combinación fija de los medicamentos seleccionados
                        </template>
                    </h3>
                </v-col>
                <v-col cols="12" v-if="comparison.history.patient_to_compare.history_content.diseases.hta.fdc.active">
                    <h3 class="font-weight-bold black--text text-center">Combinaciones a dosis fijas</h3>
                    <p class="font-weight-bold black--text text-center"
                        v-for="item in comparison.history.patient_to_compare.history_content.diseases.hta.fdc.selected">
                        {{ item }}
                    </p>
                </v-col>
            </v-col>
        </v-row>
    </v-col>
</v-row>