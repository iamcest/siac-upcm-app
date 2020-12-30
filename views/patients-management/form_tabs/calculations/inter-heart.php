
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'Inter Heart'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo Inter Heart</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Región de Origen</p>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.region" :items="patient_risk_factors.selectedForm.inter_heart_vars.european_score" item-text="region" item-value="factor" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Información general</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label for="">Edad</label>
                    <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.age" :counter="3" outlined required ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <label for="">Género</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.gender" :items="patient_risk_factors.selectedForm.inter_heart_vars.genders" item-text="gender" item-value="abbr" outlined ></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Tabaquismo</p>
                <label>¿El paciente nunca fumó?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.smoking" :items="patient_risk_factors.selectedForm.inter_heart_vars.smoking_options" item-text="text" item-value="val" outlined ></v-select>
                <template v-if="patient_risk_factors.selectedForm.inter_heart_vars.vars.smoking == 'Fumador actual'">
                  <label>Cigarros al día</label>
                  <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.smoking_amount" :items="patient_risk_factors.selectedForm.inter_heart_vars.smoking_amount" item-text="text" item-value="val" outlined></v-select>
                </template>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Fumador pasivo</p>
                <label>Exposición al humo del tabaco en el último año</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.smoking_exposition" :items="patient_risk_factors.selectedForm.inter_heart_vars.smoking_exposition" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Diabetes</p>
                <label>¿El paciente tiene diabetes?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.diabetes" :items="patient_risk_factors.selectedForm.inter_heart_vars.diabete" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Hipertensión Arterial</p>
                <label>¿El paciente tiene hipertensión?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.hipertension" :items="patient_risk_factors.selectedForm.inter_heart_vars.hipertension" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Historia Familiar</p>
                <label>¿El paciente tiene uno o ambos padres biológicos con antecedentes de infarto?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.parents_ha_history" :items="patient_risk_factors.selectedForm.inter_heart_vars.parents_ha_history" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">índice de cintura de cadera</p>
                <label>índice de cintura de cadera</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.waist_index" :items="patient_risk_factors.selectedForm.inter_heart_vars.waist_index" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Psicosociales</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿Con cuanta frecuencia el paciente sintió estres laboral o en el hogar durante el último año?</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.stress_frecuency" :items="patient_risk_factors.selectedForm.inter_heart_vars.stress_frecuency" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <label>¿Cuan activo es el paciente durante su tiempo libre?<br><br></label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.free_time_activity" :items="patient_risk_factors.selectedForm.inter_heart_vars.free_time_activity" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Dietético</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida con sal o snacks 1 o 2 veces al día?<br><br></label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.salt_snack_food_daily" :items="patient_risk_factors.selectedForm.inter_heart_vars.true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida frita, snacks o comida rápida 3 o más veces a la semana?</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.fast_food_weekly" :items="patient_risk_factors.selectedForm.inter_heart_vars.true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume 1 fruta o más veces al día?</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.eat_fruits" :items="patient_risk_factors.selectedForm.inter_heart_vars.true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume vegetales 1 o más veces al día?</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.eat_vegetables" :items="patient_risk_factors.selectedForm.inter_heart_vars.true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12">
                    <label>¿El paciente consume carne o aves 2 o más veces al día?</label>
                    <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.inter_heart_vars.vars.eat_meat" :items="patient_risk_factors.selectedForm.inter_heart_vars.true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                </v-row>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col> 

            </v-row>
          </v-form>
        </v-col>