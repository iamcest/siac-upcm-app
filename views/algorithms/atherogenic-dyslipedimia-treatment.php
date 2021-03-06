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
              <h2 class="text-center">Algoritmo terapeutico de la dislipidemia aterogénica</h2>
            </v-col>

          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Cribado de triglicéridos (sin ayuno)</label>
                <v-text-field class="mt-3" v-model="amount" hint="Ingrese la unidad en mg/dl" suffix="mg/dl" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="diagnostic" outlined readonly required ></v-text-field>
              </v-col>
              <v-col cols="12" v-if="tracking !== ''">
                <h3 class="mb-4 grey--text text--darken-2">Seguimiento</h3>
                <p>{{ tracking }}</p>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>
