<?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
    <v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-6'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-row class="factor-risk-container">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="2">
                <h4 class="text-h6 black--text">Aspecto General</h4>
            </v-col>
            <v-col cols="6">
                {{ patient_physical_exam.content.general_aspect }}
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="PYI">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">PVY</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Morfología. Seno X:
                            <template v-if="patient_physical_exam.content.pvy.morphology_breastx">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">CVY:
                            <template v-if="patient_physical_exam.content.pvy.cvy">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Tope Oscilante:
                            {{ patient_physical_exam.content.pvy.swivel_stop }}
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.percent)) + '%)'"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                        </v-badge>
                    </v-col>

                    <v-col cols="6" lg="4" v-if="patient_physical_exam.content.pvy.other != ''">
                        <span class="black--text font-weight-bold">Otra:
                            {{ patient_physical_exam.content.pvy.other }}</span>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="LC">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Latidos carotídeos</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> Simétricos:
                            <template v-if="patient_physical_exam.content.carotid_beats.symmetrical">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Homócroto:
                            <template v-if="patient_physical_exam.content.carotid_beats.homochroto">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Amplitud normal:
                            <template v-if="patient_physical_exam.content.carotid_beats.normal_amplitude">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="APEX">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Ápex</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Se palpa:
                            <template v-if="patient_physical_exam.content.apex.is_palpated">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Desplazado:
                            <template v-if="patient_physical_exam.content.apex.displaced">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold">Característica:
                            {{ patient_physical_exam.content.apex.characteristic }}
                        </span>
                    </v-col>

                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="auscultation">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Auscultación</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">Regulares:
                            <template v-if="patient_physical_exam.content.auscultation.regular">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">R1:
                            <template v-if="patient_physical_exam.content.auscultation.unfolded_r1">
                                Sí ({{ patient_physical_exam.content.auscultation.r1_type }})
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">
                            R2:
                            <template v-if="patient_physical_exam.content.auscultation.unfolded_r2">
                                Sí ({{ patient_physical_exam.content.auscultation.r2_type }})
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">R3:
                            <template v-if="patient_physical_exam.content.auscultation.unfolded_r3">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">
                            R4:
                            <template v-if="patient_physical_exam.content.auscultation.unfolded_r4">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template v-if="patient_physical_exam.content.auscultation.soplo.items.length == 1">
                        <v-col cols="4">
                            <span class="black--text font-weight-bold">Ritmo de galope:
                                <template v-if="patient_physical_exam.content.auscultation.gallop_rhythm">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </span>
                        </v-col>
                    </template>
                    <v-col cols="4">
                        <span class="black--text font-weight-bold">Soplo:
                            <template v-if="patient_physical_exam.content.auscultation.soplo.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template v-for="(soplo, index) in patient_physical_exam.content.auscultation.soplo.items"
                        v-if="patient_physical_exam.content.auscultation.soplo.active">
                        <v-col cols="12">
                            <h5 class="text-h5">Soplo {{ index + 1 }}</h5>
                        </v-col>
                        <v-col cols="4">
                            <span class="black--text font-weight-bold">{{ soplo.type }}</span>
                        </v-col>
                        <v-col cols="4">
                            <span class="black--text font-weight-bold">Foco: {{ soplo.foco }} </span>
                        </v-col>
                        <v-col cols="4">
                            <span class="black--text font-weight-bold">Intensidad: {{ soplo.intensity_foco }}
                            </span>
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index}).auscultation.soplo.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index}).auscultation.soplo.percent)) + '%)'"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            </v-badge>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="peripheral_pulses">
        <v-row class=" d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <span class="black--text font-weight-bold"> Simétricos:
                            <template v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="6" lg="4" v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                        <span class="black--text font-weight-bold"> MI:
                            {{ patient_physical_exam.content.peripheral_pulses.symmetrical_range }}
                        </span>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.percent)) + '%)'"
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                        </v-badge>
                    </v-col>
                    <template v-if="!patient_physical_exam.content.peripheral_pulses.symmetrical">
                        <v-col cols="6" lg="4">
                            <span class="black--text font-weight-bold"> MID: 
                                {{ patient_physical_exam.content.peripheral_pulses.mid }}
                            </span>
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.percent)) + '%)'"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            </v-badge>
                        </v-col>
                        <v-col cols="6" lg="4">
                            <span class="black--text font-weight-bold"> MII:
                                {{ patient_physical_exam.content.peripheral_pulses.mii }}
                            </span>
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.percent)) + '%)'"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            </v-badge>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col cols="12" id="edema">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Edema miembros inferiores</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <template>
                        <v-col cols="6" lg="4">
                            <span class="black--text font-weight-bold">
                                <template v-if="patient_physical_exam.content.edema.active">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </span>
                        </v-col>
                        <v-col cols="6" lg="4">
                            <span class="black--text font-weight-bold"> Rango:
                                {{ patient_physical_exam.content.edema.range }} </span>
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.percent)) + '%)'"
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            </v-badge>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
        </v-row>
    </v-col>

</v-row>