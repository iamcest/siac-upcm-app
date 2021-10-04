
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'FINDRISK'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmulario de FINDRISK</h2>
            </v-col>
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="6">
                <label>Edad (años cumplidos)</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.age" :counter="3" outlined required disabled></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>índice de Masa corporal(kg/m2)</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.bmi" hint="Ingrese la unidad en kg/m2" suffix="kg/m2" persistent-hint outlined required disabled></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.gender" :items="genders" item-text="name" item-value="gender" :value="editedItem.gender" disabled outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Perímetro de la cintura</label>
                <v-text-field class="mt-3 append-20" v-model="patient_risk_factors.selectedForm.obj.vars.perimeter" persistent-hint outlined required >
                  <template #append>
                    <v-select v-model="patient_risk_factors.selectedForm.obj.vars.perimeter_suffix" class="p-0 m-0 mt-n1 mb-n4" :items="['cm', 'in']" dense></v-select>
                  </template>
                </v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿El paciente realiza habitualmente (a diario) al menos 30 minutos de actividad física en el trabajo y/o tiempo libre?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.workout" :items="patient_risk_factors.selectedForm.obj.workout" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Con qué frecuencia el paciente consume verduras o frutas? <br><br></label>
                <v-select class="mt-n3" v-model="patient_risk_factors.selectedForm.obj.vars.healthy_food" :items="patient_risk_factors.selectedForm.obj.healthy_food" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Al paciente le han encontrado alguna vez valores de glucosa altos? Por ejemplo, en un control médico, durante una enfermedad, durante el embarazo?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.high_glucose" :items="patient_risk_factors.selectedForm.obj.high_glucose" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Se le ha diagnosticado diabetes (tipo 1 o 2) a alguno de sus familiares? Nota: la diabetes por edad o ya de viejo también cuenta</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.family_diabete" :items="patient_risk_factors.selectedForm.obj.family_diabete" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="patient_risk_factors.selectedForm.obj.results" outlined readonly required ></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" v-on:click="patient_risk_factors.selectedForm.obj.calc()">
                  Calcular
                </v-btn>
              </v-col>
              <!--
              <v-col cols="12">
                <p class="text-center">El puntuaje máximo es de 26 puntos. Si la puntuación es >= 12, hay una alta probabilidad de tener diabetes mellitus de tipo 2 u otra anormalidad de la reguliacíón glucosa.</p>
              </v-col>
              -->
            </v-row>
          </v-form>
        </v-col>
