    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar', $data) ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <?php echo new Template('parts/upcm_logo') ?>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Formulario de FINDRISK</h2>
            </v-col>

          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente</label>
                <v-select class="mt-3" v-model="patient" :items="patients" item-text="full_name" @change="assignGeneralVars" return-object outlined></v-select>
              </v-col>


              <v-col cols="12" md="6">
                <label>Edad (años cumplidos)</label>
                <v-text-field class="mt-3" v-model="vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Índice de Masa Corporal(kg/m2)</label>
                <v-text-field class="mt-3" v-model="vars.bmi" hint="Ingrese la unidad en kg/m2" suffix="kg/m2" persistent-hint outlined required ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Perímetro de la cintura</label>
                <v-text-field class="mt-3 append-20" v-model="vars.perimeter" persistent-hint outlined required >
                  <template #append>
                    <v-select v-model="vars.perimeter_suffix" class="p-0 m-0 mt-n1 mb-n4" :items="['cm', 'in']" dense></v-select>
                  </template>
                </v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿El paciente realiza habitualmente (a diario) al menos 30 minutos de actividad física en el trabajo y/o tiempo libre?</label>
                <v-select class="mt-3" v-model="vars.workout" :items="workout" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Con qué frecuencia el paciente consume verduras o frutas? <br><br></label>
                <v-select class="mt-3" v-model="vars.healthy_food" :items="healthy_food" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Al paciente le han encontrado alguna vez valores de glucosa altos? Por ejemplo, en un control médico, durante una enfermedad, durante el embarazo?</label>
                <v-select class="mt-3" v-model="vars.high_glucose" :items="high_glucose" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿Se le ha diagnosticado diabetes (tipo 1 o 2) a alguno de sus familiares? Nota: la diabetes por edad o ya de viejo también cuenta</label>
                <v-select class="mt-3" v-model="vars.family_diabete" :items="family_diabete" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calc" outlined readonly required ></v-text-field>
              </v-col>
              <v-col cols="12">
                <p class="text-center">El puntuaje máximo es de 26 puntos. Si la puntuación es >= 12, hay una alta probabilidad de tener diabetes mellitus de tipo 2 u otra anormalidad de la reguliacíón glucosa.</p>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
