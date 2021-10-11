
        <v-col cols="12"class="pt-8">
          <v-form ref="fagerstrom_form">
            <v-row class="px-6">

              <v-col cols="12" md="6">
                <label>¿Cuánto tiempo pasa entre que se levanta y se fuma su primer cigarrillo?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input1" :items="patient_life_style.calc.fagerstrom.options.input1" @change="fagerstromTest" outlined></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Encuentra difícil no fumar en lugares donde está prohibido (hospital, cine, biblioteca)?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input2" :items="patient_life_style.options.smoking_select" @change="fagerstromTest" outlined></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Qué cigarrillo le desagrada más dejar de fumar?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input3" :items="patient_life_style.calc.fagerstrom.options.input3" @change="fagerstromTest" outlined></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Cuántos cigarrillos fuma al día?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input4" :items="patient_life_style.calc.fagerstrom.options.input4" @change="fagerstromTest" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Fuma con más frecuencia durante las primeras horas después de levantarse que durante el resto del día?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input5" :items="patient_life_style.options.smoking_select" @change="fagerstromTest" outlined></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Fuma aunque esté tan enfermo que tenga que guardar cama la mayor parte del día?</label>
                <v-select class="mt-3" v-model="patient_life_style.calc.fagerstrom.vars.input6" :items="patient_life_style.options.smoking_select" @change="fagerstromTest" outlined></v-select>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="patient_life_style.calc.fagerstrom.result" :hint="getFagerStromScoreDescription(true)" persistent-hint outlined readonly></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" @click="patient_life_style.editedItem.smoking.fagerstrom_test = patient_life_style.calc.fagerstrom.result; patient_life_style.calc.fagerstrom.form_dialog = false">
                  Guardar
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
