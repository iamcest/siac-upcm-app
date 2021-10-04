<v-row class="factor-risk-container">
    <v-col class="mb-n10" cols="12">
        <v-row>
            <v-col cols="2">
                <h4 class="text-h6 black--text">Aspecto General</h4>
            </v-col>
            <v-col cols="6">
                <v-select v-model="patient_physical_exam.content.general_aspect"
                    :items="patient_physical_exam.options.general_aspect" outlined dense></v-select>
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
                        <v-select v-model="patient_physical_exam.content.pvy.morphology_breastx"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Seno X</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.pvy.cvy"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">CVY</span>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.pvy.swivel_stop"
                            :items="[1,2,3,4,5,6,7,8,9,10]" suffix="cm" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Tope Oscilante</span>
                            </template>
                        </v-select>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                            <v-row class="d-flex justify-center">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').pvy.swivel_stop.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </template>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-text-field v-model="patient_physical_exam.content.pvy.other" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Otra</span>
                            </template>
                        </v-text-field>
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
                        <v-select v-model="patient_physical_exam.content.carotid_beats.symmetrical"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold"> Simétricos</span>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.carotid_beats.homochroto"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Homócroto</span>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.carotid_beats.normal_amplitude"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Amplitud normal</span>
                            </template>
                        </v-select>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="apex">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text">Ápex</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.apex.is_palpated"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Se palpa</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.apex.displaced"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Desplazado</span>
                            </template>
                        </v-select>
                    </v-col>

                    <v-col cols="6" lg="4">
                        <v-select v-model="patient_physical_exam.content.apex.characteristic"
                            :items="['Normokinético', 'Sostenido', 'Hiperdinámico']" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Característica</span>
                            </template>
                        </v-select>
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
                    <v-col cols="6">
                        <v-select v-model="patient_physical_exam.content.auscultation.regular"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Regulares</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6"></v-col>
                    <v-col cols="12">
                        <v-row>
                            <v-col cols="6">
                                <v-select v-model="patient_physical_exam.content.auscultation.unfolded_r1"
                                    :items="patient_physical_exam.options.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="black--text font-weight-bold">R1</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="6" v-if="parseInt(patient_physical_exam.content.auscultation.unfolded_r1)">
                                <v-select v-model="patient_physical_exam.content.auscultation.r1_type"
                                    :items="['Único', 'Desdoblado']" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="black--text font-weight-bold"></span>
                                    </template>
                                </v-select>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col cols="12">
                        <v-row>
                            <v-col cols="6">
                                <v-select v-model="patient_physical_exam.content.auscultation.unfolded_r2"
                                    :items="patient_physical_exam.options.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="black--text font-weight-bold">R2</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="6" v-if="parseInt(patient_physical_exam.content.auscultation.unfolded_r2)">
                                <v-select v-model="patient_physical_exam.content.auscultation.r2_type"
                                    :items="['Único', 'Desdoblado']" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="black--text font-weight-bold"></span>
                                    </template>
                                </v-select>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col cols="6">
                        <v-select v-model="patient_physical_exam.content.auscultation.unfolded_r3"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">R3</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6">
                        <v-select v-model="patient_physical_exam.content.auscultation.unfolded_r4"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">R4</span>
                            </template>
                        </v-select>
                    </v-col>
                    <template v-if="patient_physical_exam.content.auscultation.soplo.items.length == 1">
                        <v-col cols="6">
                            <v-select v-model="patient_physical_exam.content.auscultation.gallop_rhythm"
                                :items="patient_physical_exam.options.select" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="black--text font-weight-bold">Ritmo de galope</span>
                                </template>
                            </v-select>
                        </v-col>
                    </template>
                    <v-col cols="6">
                        <v-select v-model="patient_physical_exam.content.auscultation.soplo.active"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">Soplo</span>
                            </template>
                        </v-select>
                    </v-col>
                    <template v-for="(soplo, index) in patient_physical_exam.content.auscultation.soplo.items"
                        v-if="patient_physical_exam.content.auscultation.soplo.active">
                        <v-col class="d-flex justify-end" cols="12"
                            v-if="patient_physical_exam.content.auscultation.soplo.items.length > 1">
                            <v-btn color="error"
                                @click="patient_physical_exam.content.auscultation.soplo.items.splice(index, 1)"
                                rounded>
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-col>
                        <v-col cols="6">
                            <v-select v-model="soplo.type" :items="patient_physical_exam.options.soplo" outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="6">
                            <v-select v-model="soplo.foco"
                                :items="patient_physical_exam.content.auscultation.soplo.foco_options" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="black--text font-weight-bold">Foco</span>
                                </template>
                                <template #prepend-item>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-text-field :ref="'pe_foco'+index+'_treatment'" placeholder="Incluir otro"
                                                dense outlined></v-text-field>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-btn class="mt-n6" color="primary" text
                                        @click="addItemToArray($refs['pe_foco'+index+'_treatment'][0].internalValue, patient_physical_exam.content.auscultation.soplo.foco_options)">
                                        <v-icon>mdi-plus-circle</v-icon>
                                        Añadir
                                    </v-btn>
                                    <v-divider class="mt-2"></v-divider>
                                </template>
                            </v-select>
                        </v-col>
                        <v-col cols="6">
                            <v-select v-model="soplo.intensity_foco" :items="[1, 2, 3, 4]" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="black--text font-weight-bold">Intensidad</span>
                                </template>
                            </v-select>
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                                <v-row class="d-flex justify-center">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index}).auscultation.soplo.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {soplo: soplo, i: index}).auscultation.soplo.percent)) + '%)'">
                                    </v-badge>
                                </v-row>
                            </template>
                        </v-col>
                        <v-col class="d-flex justify-center" cols="12"
                            v-if="patient_physical_exam.content.auscultation.soplo.items.length < 2">
                            <v-btn color="secondary" @click="patient_physical_exam.content.auscultation.soplo.items.push({
                  gallop_rhythm: 0,
                  foco_options: ['Aórtico', 'Mitral', 'Tricuspideo', 'Pulmonar'],
                  type: '',
                  foco: '',
                  intensity_foco: ''
                })" rounded>Agregar otro Soplo</v-btn>
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
                        <v-select v-model="patient_physical_exam.content.peripheral_pulses.symmetrical"
                            :items="patient_physical_exam.options.select" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold"> Simétricos</span>
                            </template>
                        </v-select>
                    </v-col>
                    <v-col cols="6" lg="4" v-if="patient_physical_exam.content.peripheral_pulses.symmetrical">
                        <v-select v-model="patient_physical_exam.content.peripheral_pulses.symmetrical_range"
                            :items="[1,2,3,4,5,6]" outlined dense>
                            <template class="black-text" #prepend>
                                <span class="black--text font-weight-bold">MI</span>
                            </template>
                        </v-select>
                        <v-row class="d-flex justify-center">
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                                <v-badge color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.symmetrical_range.percent)) + '%)'">
                                </v-badge>
                            </template>
                        </v-row>
                    </v-col>
                    <template v-if="!patient_physical_exam.content.peripheral_pulses.symmetrical">
                        <v-col cols="6" lg="4">
                            <v-select v-model="patient_physical_exam.content.peripheral_pulses.mid"
                                :items="[1,2,3,4,5,6]" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="black--text font-weight-bold"> MID</span>
                                </template>
                            </v-select>
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                                <v-row class="d-flex justify-center">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mid.percent)) + '%)'">
                                    </v-badge>
                                </v-row>
                            </template>
                        </v-col>
                        <v-col cols="6" lg="4">
                            <v-select v-model="patient_physical_exam.content.peripheral_pulses.mii"
                                :items="[1,2,3,4,5,6]" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="black--text font-weight-bold"> MII</span>
                                </template>
                            </v-select>
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                                <v-row class="d-flex justify-center">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam', {pp: true}).pp.mii.percent)) + '%)'">
                                    </v-badge>
                                </v-row>
                            </template>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-divider></v-divider>
            </v-col>
        </v-row>
    </v-col>

    <v-col class="mb-n10" cols="12" id="edema">
        <v-row class="d-flex align-center">
            <v-col cols="2">
                <h4 class="text-h6 black--text mt-n6">Edema miembros inferiores</h4>
            </v-col>
            <v-col cols="9">
                <v-row>
                    <v-col cols="6" v-if="!patient_physical_exam.content.edema.active">
                        <v-select v-model="patient_physical_exam.content.edema.active"
                            :items="patient_physical_exam.options.select" outlined dense>
                        </v-select>
                    </v-col>
                    <template v-else>
                        <v-col cols="6" lg="4">
                            <v-select v-model="patient_physical_exam.content.edema.active"
                                :items="patient_physical_exam.options.select" outlined dense>
                            </v-select>
                        </v-col>
                        <v-col cols="6" lg="4">
                            <v-select v-model="patient_physical_exam.content.edema.range" :items="[1,2,3,4]" outlined
                                dense>
                            </v-select>
                            <template
                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_physical_exam.items.length > 1">
                                <v-row class="d-flex justify-center mb-6">
                                    <v-badge color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('physical-exam').edema.percent)) + '%)'">
                                    </v-badge>
                                </v-row>
                            </template>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
        </v-row>
    </v-col>

</v-row>
<v-row>
    <v-col cols="12">
        <v-btn color="secondary white--text" @click="savePhysicalExam" :loading="patient_physical_exam.loading" block>
            Guardar
        </v-btn>
    </v-col>
</v-row>