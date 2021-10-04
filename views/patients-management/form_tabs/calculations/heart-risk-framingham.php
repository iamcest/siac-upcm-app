
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'Evaluación del riesgo cardiovascular (10 años, Framingham 2008)'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Evaluación del riesgo cardiovascular (10 años, Framingham 2008)</h2>
            </v-col>
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="6">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.age" outlined required disabled></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.gender" :items="genders" item-text="name" item-value="gender" :value="editedItem.gender" disabled outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>TA sis</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.ta_sis" hint="Ingrese la unidad en mg/dL" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Col total</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.col_total" hint="Ingrese la unidad en mg/dL" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Col HDL</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.col_hdl" hint="Ingrese la unidad en mg/dL" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>En tratamiento con medicación para la hipertensión</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.hta_treatment" :items="patient_risk_factors.selectedForm.obj.hta_treatment" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Fumador de cigarrillos</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.smoking" :items="patient_risk_factors.selectedForm.obj.smoking" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Presencia de diabetes</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.diabetes" :items="patient_risk_factors.selectedForm.obj.diabetes" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="patient_risk_factors.selectedForm.obj.results" :suffix="patient_risk_factors.selectedForm.obj.nomenclature" outlined readonly required ></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" v-on:click="patient_risk_factors.selectedForm.obj.calc()">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
