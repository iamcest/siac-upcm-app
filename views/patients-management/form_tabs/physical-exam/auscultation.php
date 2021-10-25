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
                            @click="patient_physical_exam.content.auscultation.soplo.items.splice(index, 1)" rounded>
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