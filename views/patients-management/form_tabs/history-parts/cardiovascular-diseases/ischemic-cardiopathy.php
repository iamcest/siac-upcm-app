<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Cardiopatía isquémica</h3>
            </v-col>
            <v-col cols="12" md="6">
                <v-card class="px-4" outlined>
                    <v-col cols="12">
                        <h3 class="text-center black--text">Síndrome Coronario Agudo</h3>
                    </v-col>
                    <v-row>
                        <v-col cols="12" lg="6">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.active"
                                :items="patient_history.select" outlined dense>
                            </v-select>
                        </v-col>
                    </v-row>
                    <v-row
                        v-for="(IM, index) in patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.im">
                        <template
                            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.active">
                            <v-col class="mt-n10 d-flex justify-end" cols="12" v-if="index != 0">
                                <v-btn color="error" text
                                    @click="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.im.splice(index, 1)"
                                    right>
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                            </v-col>
                            <v-col class="mt-n10" cols="12">
                                <h6 class="text-h6 text-center">
                                    IM:
                                </h6>
                            </v-col>
                            <v-col cols="12" lg="6">
                                <v-select v-model="IM.q" :items="patient_history.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Q:</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="12" lg="6">
                                <v-select v-model="IM.no_q" :items="patient_history.select" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">No Q:</span>
                                    </template>
                                </v-select>
                            </v-col>
                            <v-col cols="12" lg="6">
                                <v-dialog ref="cd_ischemic_cardiopathy_sca_im_year_modal"
                                    v-model="ph_cd_ischemic_cardiopathy_sca_im_year_modal" width="290px">
                                    <template #activator="{ on, attrs }">
                                        <v-text-field :value="getOnlyYear(IM.year)" append-icon="mdi-calendar" readonly
                                            v-bind="attrs" v-on="on"
                                            @click="patient_history.modals.ischemic_cardiopathy.current = index"
                                            outlined dense>
                                            <template class="black-text" #prepend>
                                                <span class="font-weight-bold">Año:</span>
                                            </template>
                                        </v-text-field>
                                    </template>
                                    <v-date-picker ref="cd_ischemic_cardiopathy_sca_im_datepicker" v-model="IM.year"
                                        @input="$refs.cd_ischemic_cardiopathy_sca_im_year_modal[index].save(IM.year)"
                                        locale="es" reactive no-title scrollable>
                                    </v-date-picker>
                                </v-dialog>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field v-model="IM.localization" outlined dense>
                                    <template class="black-text" #prepend>
                                        <span class="font-weight-bold">Localización</span>
                                    </template>
                                </v-text-field>
                            </v-col>
                        </template>
                        <v-col cols="12"
                            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.has_im == 3 && 1 == 2">
                            <v-btn color="secondary" @click="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.im.push(
                    {
                        q: 1,
                        no_q: 1,
                        year: '',
                        localization: '',
                    }
                  )" light block>
                                Agregar más infartos
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>

            <v-col cols="12" md="6">
                <v-card class="px-4" outlined>
                    <v-row>
                        <v-col cols="12">
                            <h3 class="text-center black--text">Síndrome Coronario Crónico</h3>
                        </v-col>
                        <v-col cols="12" lg="6">
                            <v-dialog ref="cd_ischemic_cardiopathy_scai_ua_year_modal"
                                v-model="ph_cd_ischemic_cardiopathy_scai_ua_year_modal" width="290px">
                                <template #activator="{ on, attrs }">
                                    <v-text-field
                                        :value="getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.scai.year)"
                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined dense>
                                        <template class="black-text" #prepend>
                                            <span class="font-weight-bold">Año:</span>
                                        </template>
                                    </v-text-field>
                                </template>
                                <v-date-picker ref="cd_ischemic_cardiopathy_scai_ua_datepicker"
                                    v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.scai.year"
                                    @input="$refs.cd_ischemic_cardiopathy_scai_ua_year_modal.save(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.scai.year)"
                                    locale="es" reactive no-title scrollable>
                                </v-date-picker>
                            </v-dialog>
                        </v-col>

                    </v-row>
                </v-card>
            </v-col>
            <v-col cols="12" md="6" offset-md="3">
                <v-card class="px-4" outlined>
                    <v-row>
                        <v-col cols="8" lg="6">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active"
                                :items="patient_history.select" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">Revascularizado:</span>
                                </template>
                            </v-select>
                        </v-col>
                        <template
                            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">
                            <v-col cols="12">
                                <v-row>
                                    <v-col cols="12" lg="6">
                                        <v-select
                                            v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active"
                                            :items="patient_history.select" outlined dense>
                                            <template class="black-text" #prepend>
                                                <span class="font-weight-bold">Quirúrgico:</span>
                                            </template>
                                        </v-select>
                                    </v-col>
                                    <template
                                        v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active">
                                        <v-col cols="12" lg="6">
                                            <v-dialog ref="ph_cd_ischemic_cardiopathy_surgery_year"
                                                v-model="ph_cd_ischemic_cardiopathy_surgery_year_modal" width="290px">
                                                <template #activator="{ on, attrs }">
                                                    <v-text-field
                                                        :value="getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.year)"
                                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"
                                                        outlined dense>
                                                        <template class="black-text" #prepend>
                                                            <span class="font-weight-bold">Año:</span>
                                                        </template>
                                                    </v-text-field>
                                                </template>
                                                <v-date-picker ref="cd_ischemic_cardiopathy_surgery_year_datepicker"
                                                    v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.year"
                                                    @input="$refs.ph_cd_ischemic_cardiopathy_surgery_year.save(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.year)"
                                                    locale="es" reactive no-title scrollable>
                                                </v-date-picker>
                                            </v-dialog>
                                        </v-col>
                                        <v-col cols="12" lg="6">
                                            <v-select
                                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.bridge"
                                                :items="patient_history.options.ischemic_cardiopathy.general_select"
                                                outlined dense>
                                                <template class="black-text" #prepend>
                                                    <span class="font-weight-bold">N° de Puentes:</span>
                                                </template>
                                            </v-select>
                                        </v-col>
                                    </template>
                                </v-row>
                            </v-col>
                            <v-col cols="12">
                                <v-row>
                                    <v-col cols="12" lg="6">
                                        <v-select
                                            v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active"
                                            :items="patient_history.select" outlined dense>
                                            <template class="black-text" #prepend>
                                                <span class="font-weight-bold">Percutáneo:</span>
                                            </template>
                                        </v-select>
                                    </v-col>
                                    <template
                                        v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active">
                                        <v-col cols="12" lg="6">
                                            <v-dialog ref="cd_ischemic_cardiopathy_percutaneous_year_modal"
                                                v-model="ph_cd_ischemic_cardiopathy_percutaneous_year_modal"
                                                width="290px">
                                                <template #activator="{ on, attrs }">
                                                    <v-text-field
                                                        :value="getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.year)"
                                                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on"
                                                        outlined dense>
                                                        <template class="black-text" #prepend>
                                                            <span class="font-weight-bold">Año:</span>
                                                        </template>
                                                    </v-text-field>
                                                </template>
                                                <v-date-picker
                                                    ref="cd_ischemic_cardiopathy_percutaneous_year_datepicker"
                                                    v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.year"
                                                    @input="$refs.cd_ischemic_cardiopathy_percutaneous_year_modal.save(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.year)"
                                                    locale="es" reactive no-title scrollable>
                                                </v-date-picker>
                                            </v-dialog>
                                        </v-col>
                                        <v-col cols="12" lg="6">
                                            <v-select
                                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.vessels"
                                                :items="patient_history.options.ischemic_cardiopathy.general_select"
                                                outlined dense>
                                                <template class="black-text" #prepend>
                                                    <span class="font-weight-bold">N° de Vasos:</span>
                                                </template>
                                            </v-select>
                                        </v-col>
                                        <v-col cols="12" lg="6">
                                            <v-select
                                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent"
                                                :items="patient_history.options.ischemic_cardiopathy.general_select"
                                                outlined dense>
                                                <template class="black-text" #prepend>
                                                    <span class="font-weight-bold">Stent:</span>
                                                </template>
                                            </v-select>
                                        </v-col>
                                        <v-col cols="12" lg="6"
                                            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent != ''">
                                            <v-select
                                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.medicated"
                                                :items="patient_history.select" outlined dense>
                                                <template class="black-text" #prepend>
                                                    <span class="font-weight-bold">Medicado:</span>
                                                </template>
                                            </v-select>
                                        </v-col>
                                    </template>
                                </v-row>
                            </v-col>
                        </template>
                        <v-col cols="12" lg="8">
                            <v-select
                                v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.functional_class_canada"
                                :items="patient_history.options.arritmia.functional_class_canada" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">Clase funcional canadiense:</span>
                                </template>
                            </v-select>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </v-card>
</v-container>