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
              <h2 class="text-center">Fórmula CrCI Cockroft - Gault</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente</label>
                <v-select class="mt-3" v-model="patient" :items="patients" item-text="full_name" @change="assignGeneralVars" return-object outlined></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Peso</label>
                <v-text-field class="mt-3 append-20" v-model="vars.weight" :counter="7" outlined required >
                  <template #append>
                    <v-select v-model="vars.weight_suffix" class="p-0 m-0 mt-n1 mb-n4" :items="['kg', 'lb']" dense></v-select>
                  </template>
                </v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Suero de creatinina</label>
                <v-text-field class="mt-3" v-model="vars.creatinine_serum" :counter="7" suffix="mg/dl" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calc" outlined readonly required ></v-text-field>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>