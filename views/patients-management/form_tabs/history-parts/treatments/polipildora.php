<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5 text-center black--text">Polipíldora</h3>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="10" :md="patient_history.form.history_content.treatments.polipildora.selected.length < 4
                ? 8 + patient_history.form.history_content.treatments.polipildora.selected.length : 12" :lg="patient_history.form.history_content.treatments.polipildora.selected.length < 4
                ? 6 + patient_history.form.history_content.treatments.polipildora.selected.length : 12">
                    <v-row>
                        <v-col cols="12">
                            <h3 class="font-weight-bold black--text text-center">Toma polipildora</h3>
                            <label class="white--text font-weight-bold">.</label>
                            <v-select v-model="patient_history.form.history_content.treatments.polipildora.active"
                                :items="patient_history.select" class="mt-3" persistent-hint outlined dense>
                            </v-select>
                        </v-col>
                        <template v-if="!patient_history.form.history_content.treatments.polipildora.active">
                            <v-col cols="12">
                                <h3 class="font-weight-bold black--text text-center">Es candidato</h3>
                                <label class="white--text font-weight-bold">.</label>
                                <v-select
                                    v-model="patient_history.form.history_content.treatments.polipildora.candidate"
                                    :items="patient_history.select" class="mt-3"
                                    hint="¿Este paciente califica para la indicación de Polipíldora?" persistent-hint
                                    outlined dense>
                                </v-select>
                            </v-col>
                            <template v-if="patient_history.form.history_content.treatments.polipildora.candidate">
                                <v-col class="mt-n6" cols="12">
                                    <v-select ref="polipildora_select"
                                        v-model="patient_history.form.history_content.treatments.polipildora.selected"
                                        :items="patient_history.form.history_content.treatments.polipildora.treatments_list.polipildora"
                                        item-text="name" class="mt-3" return-object multiple outlined dense>
                                        <template #prepend-item>
                                            <v-row class="px-7">
                                                <v-btn color="secondary" @click="$refs.polipildora_select.blur()" block>
                                                    Cerrar
                                                </v-btn>
                                            </v-row>
                                            <v-list-item>
                                                <v-list-item-content>
                                                    <v-text-field ref="polipildora_treatment" placeholder="Incluir otro"
                                                        dense outlined></v-text-field>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-btn class="mt-n6" color="primary" text @click="addItemToArray(
                                            {
                                                name: $refs.polipildora_treatment.internalValue,
                                                dosis_selected: '',
                                                dosis: []
                                            }, 
                                            patient_history.form.history_content.treatments.polipildora.treatments_list.polipildora
                                        )">
                                                <v-icon>mdi-plus-circle</v-icon>
                                                Añadir
                                            </v-btn>
                                            <v-divider class="mt-2"></v-divider>
                                        </template>
                                    </v-select>
                                </v-col>
                                <v-col class="mt-n6" cols="12">
                                    <label>Razón</label>
                                    <v-select ref="polipildora_reason_select"
                                        v-model="patient_history.form.history_content.treatments.polipildora.reason"
                                        :items="patient_history.form.history_content.treatments.polipildora.treatments_list.polipildora_reason"
                                        class="mt-3" multiple outlined dense>
                                        <template #prepend-item>
                                            <v-row class="px-7">
                                                <v-btn color="secondary" @click="$refs.polipildora_reason_select.blur()"
                                                    block>
                                                    Cerrar
                                                </v-btn>
                                            </v-row>
                                            <v-list-item>
                                                <v-list-item-content>
                                                    <v-text-field ref="polipildora_reason" placeholder="Incluir otro"
                                                        dense outlined></v-text-field>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-btn class="mt-n6" color="primary" text
                                                @click="addItemToArray($refs.polipildora_reason.internalValue, patient_history.form.history_content.treatments.polipildora.treatments_list.polipildora_reason)">
                                                <v-icon>mdi-plus-circle</v-icon>
                                                Añadir
                                            </v-btn>
                                            <v-divider class="mt-2"></v-divider>
                                        </template>
                                    </v-select>
                                </v-col>
                                <v-col cols="12"
                                    v-if="patient_history.form.history_content.treatments.polipildora.selected.length > 0">
                                    <v-row align="center">
                                        <v-col cols="12" md="4"
                                            v-for="item, i in patient_history.form.history_content.treatments.polipildora.selected">
                                            <v-row>
                                                <v-col cols="12">
                                                    <p class="text-h6 black--text text-center">
                                                        {{ item.name }}
                                                    </p>
                                                </v-col>
                                                <v-col class="mt-n6" cols="12">
                                                    <label class="black--text">Dosis</label>
                                                    <v-select ref="polipildora_dosis_select"
                                                        v-model="patient_history.form.history_content.treatments.polipildora.selected[i].dosis_selected"
                                                        :items="item.dosis" class="mt-3" outlined dense>
                                                        <template #prepend-item>
                                                            <v-row class="px-7">
                                                                <v-btn color="secondary"
                                                                    @click="$refs.polipildora_dosis_select[i].blur()"
                                                                    block>
                                                                    Cerrar
                                                                </v-btn>
                                                            </v-row>
                                                            <v-list-item>
                                                                <v-list-item-content>
                                                                    <v-text-field v-model="item.new_dosis"
                                                                        placeholder="Incluir otra" dense outlined>
                                                                    </v-text-field>
                                                                </v-list-item-content>
                                                            </v-list-item>
                                                            <v-btn class="mt-n6" color="primary" text
                                                                @click="addItemToArray(item.new_dosis, item.dosis)">
                                                                <v-icon>mdi-plus-circle</v-icon>
                                                                Añadir
                                                            </v-btn>
                                                            <v-divider class="mt-2"></v-divider>
                                                        </template>
                                                    </v-select>
                                                </v-col>
                                            </v-row>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </template>
                        </template>

                    </v-row>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>