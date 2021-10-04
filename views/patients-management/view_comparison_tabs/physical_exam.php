<template v-if="viewPatientsComparisonDialog && comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_selected.full_name }}
        </h4>
    </v-col>
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{  comparison.patient_to_compare.full_name }}
        </h4>
    </v-col>
    <v-col cols="6" id="physical_exam_cp">
        <v-row class="factor-risk-container">
            <v-col class="mb-n10" cols="12">
                <v-row>
                    <v-col cols="2">
                        <h4 class="text-h6 black--text">Aspecto General</h4>
                    </v-col>
                    <v-col cols="6">
                        {{ comparison.physical_exams.current_patient.content.general_aspect }}
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.pvy.morphology_breastx">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">CVY:
                                    <template v-if="comparison.physical_exams.current_patient.content.pvy.cvy">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Tope Oscilante:
                                    {{ comparison.physical_exams.current_patient.content.pvy.swivel_stop }}
                                </span>
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: false}, true).pvy.swivel_stop.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: false}, true).pvy.swivel_stop.percent)) + '%)'"
                                    v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                </v-badge>
                            </v-col>

                            <v-col cols="6" lg="4"
                                v-if="comparison.physical_exams.current_patient.content.pvy.other != ''">
                                <span class="black--text font-weight-bold">Otra:
                                    {{ comparison.physical_exams.current_patient.content.pvy.other }}</span>
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.carotid_beats.symmetrical">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Homócroto:
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.carotid_beats.homochroto">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Amplitud normal:
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.carotid_beats.normal_amplitude">
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
                                    <template v-if="comparison.physical_exams.current_patient.content.apex.is_palpated">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Desplazado:
                                    <template v-if="comparison.physical_exams.current_patient.content.apex.displaced">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Característica:
                                    {{ comparison.physical_exams.current_patient.content.apex.characteristic }}
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.regular">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">R1:
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.unfolded_r1">
                                        Sí ({{ comparison.physical_exams.current_patient.content.auscultation.r1_type }})
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">
                                    R2:
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.unfolded_r2">
                                        Sí ({{ comparison.physical_exams.current_patient.content.auscultation.r2_type }})
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">R3:
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.unfolded_r3">
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.unfolded_r4">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <template v-if="comparison.physical_exams.current_patient.content.auscultation.content.auscultation.soplo.items.length == 1">
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">Ritmo de galope:
                                        <template v-if="comparison.physical_exams.patient_to_compare.content.auscultation.gallop_rhythm">
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.auscultation.soplo.active">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <template
                                v-for="(soplo, index) in comparison.physical_exams.current_patient.content.auscultation.soplo.items"
                                v-if="comparison.physical_exams.current_patient.content.auscultation.soplo.active">
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
                                    <span class="black--text font-weight-bold">Intensidad:
                                        {{ soplo.intensity_foco }}
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index, patient_to_compare: false}, true).auscultation.soplo.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index, patient_to_compare: false}, true).auscultation.soplo.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
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
                                    <template
                                        v-if="comparison.physical_exams.current_patient.content.peripheral_pulses.symmetrical">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4"
                                v-if="comparison.physical_exams.current_patient.content.peripheral_pulses.symmetrical">
                                <span class="black--text font-weight-bold"> MI:
                                    {{ comparison.physical_exams.current_patient.content.peripheral_pulses.symmetrical_range }}
                                </span>
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.symmetrical_range.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.symmetrical_range.percent)) + '%)'"
                                    v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                </v-badge>
                            </v-col>
                            <template
                                v-if="!comparison.physical_exams.current_patient.content.peripheral_pulses.symmetrical">
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> MID:
                                        <template
                                            v-if="comparison.physical_exams.current_patient.content.peripheral_pulses.mid">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.mid.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.mid.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                    </v-badge>
                                </v-col>
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> MII:
                                        {{ comparison.physical_exams.current_patient.content.peripheral_pulses.mii }}
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.mii.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: false}, true).pp.mii.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
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
                                        <template v-if="comparison.physical_exams.current_patient.content.edema.active">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                </v-col>
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> Rango:
                                        {{ comparison.physical_exams.current_patient.content.edema.range }} </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: false }, true).edema.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: false }, true).edema.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                    </v-badge>
                                </v-col>
                            </template>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>

        </v-row>
    </v-col>

    <v-col cols="6" id="physical_exam_ptc">
        <v-row class="factor-risk-container">
            <v-col class="mb-n10" cols="12">
                <v-row>
                    <v-col cols="2">
                        <h4 class="text-h6 black--text">Aspecto General</h4>
                    </v-col>
                    <v-col cols="6">
                        {{ comparison.physical_exams.patient_to_compare.content.general_aspect }}
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.pvy.morphology_breastx">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">CVY:
                                    <template v-if="comparison.physical_exams.patient_to_compare.content.pvy.cvy">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Tope Oscilante:
                                    {{ comparison.physical_exams.patient_to_compare.content.pvy.swivel_stop }}
                                </span>
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: true}, true).pvy.swivel_stop.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: true}, true).pvy.swivel_stop.percent)) + '%)'"
                                    v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                </v-badge>
                            </v-col>

                            <v-col cols="6" lg="4"
                                v-if="comparison.physical_exams.patient_to_compare.content.pvy.other != ''">
                                <span class="black--text font-weight-bold">Otra:
                                    {{ comparison.physical_exams.patient_to_compare.content.pvy.other }}</span>
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.carotid_beats.symmetrical">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Homócroto:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.carotid_beats.homochroto">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Amplitud normal:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.carotid_beats.normal_amplitude">
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.apex.is_palpated">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Desplazado:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.apex.displaced">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>

                            <v-col cols="6" lg="4">
                                <span class="black--text font-weight-bold">Característica:
                                    {{ comparison.physical_exams.patient_to_compare.content.apex.characteristic }}
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.regular">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">R1:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.unfolded_r1">
                                        Sí ({{ comparison.physical_exams.patient_to_compare.content.auscultation.r1_type }})
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">
                                    R2:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.unfolded_r2">
                                        Sí ({{ comparison.physical_exams.patient_to_compare.content.auscultation.r2_type }})
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="4">
                                <span class="black--text font-weight-bold">R3:
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.unfolded_r3">
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.unfolded_r4">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <template v-if="comparison.physical_exams.patient_to_compare.content.auscultation.soplo.items.length == 1">
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">Ritmo de galope:
                                        <template v-if="comparison.physical_exams.patient_to_compare.content.auscultation.gallop_rhythm">
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.auscultation.soplo.active">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <template
                                v-for="(soplo, index) in comparison.physical_exams.patient_to_compare.content.auscultation.soplo.items"
                                v-if="comparison.physical_exams.patient_to_compare.content.auscultation.soplo.active">
                                <v-col cols="12">
                                    <h5 class="text-h5">Soplo {{ index + 1 }}</h5>
                                </v-col>
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">{{ soplo.type }}</span>
                                </v-col>
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">Ritmo de galope:
                                        <template v-if="soplo.gallop_rhythm">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                </v-col>
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">Foco: {{ soplo.foco }} </span>
                                </v-col>
                                <v-col cols="4">
                                    <span class="black--text font-weight-bold">Intensidad:
                                        {{ soplo.intensity_foco }}
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index, patient_to_compare: true}, true).auscultation.soplo.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index, patient_to_compare: true}, true).auscultation.soplo.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
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
                                    <template
                                        v-if="comparison.physical_exams.patient_to_compare.content.peripheral_pulses.symmetrical">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="6" lg="4"
                                v-if="comparison.physical_exams.patient_to_compare.content.peripheral_pulses.symmetrical">
                                <span class="black--text font-weight-bold"> MI:
                                    {{ comparison.physical_exams.patient_to_compare.content.peripheral_pulses.symmetrical_range }}
                                </span>
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.symmetrical_range.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.symmetrical_range.percent)) + '%)'"
                                    v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                </v-badge>
                            </v-col>
                            <template
                                v-if="!comparison.physical_exams.patient_to_compare.content.peripheral_pulses.symmetrical">
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> MID:
                                        <template
                                            v-if="comparison.physical_exams.patient_to_compare.content.peripheral_pulses.mid">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.mid.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.mid.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                    </v-badge>
                                </v-col>
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> MII:
                                        {{ comparison.physical_exams.patient_to_compare.content.peripheral_pulses.mii }}
                                    </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.mii.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true, patient_to_compare: true}, true).pp.mii.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
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
                                        <template
                                            v-if="comparison.physical_exams.patient_to_compare.content.edema.active">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                </v-col>
                                <v-col cols="6" lg="4">
                                    <span class="black--text font-weight-bold"> Rango:
                                        {{ comparison.physical_exams.patient_to_compare.content.edema.range }} </span>
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: true }, true).edema.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {patient_to_compare: true }, true).edema.percent)) + '%)'"
                                        v-if="comparison.physical_exams.current_patient.hasOwnProperty('patient_id')">
                                    </v-badge>
                                </v-col>
                            </template>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>

        </v-row>
    </v-col>
</template>