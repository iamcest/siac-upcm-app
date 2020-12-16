    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Algoritmo para el diagnóstico y tratamiento de la hipertensión arterial</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Medida de PA ambulatoria (automedida)</label>
                <v-text-field class="mt-3" v-model="calc.amount" suffix="mmHg" hint="Ingrese la unidad en mmHg" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Diagnóstico</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>  
              <v-col cols="12">
                <h3 class="mb-4 grey--text text--darken-2">Tratamiento</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum iure doloribus, minima saepe quos nulla, velit! Enim, beatae maiores saepe a, dolorum voluptas nesciunt obcaecati sit neque vel, omnis fugiat!</p>

                <h3 class="mt-4 grey--text text--darken-2">AMPA</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum iure doloribus, minima saepe quos nulla, velit! Enim, beatae maiores saepe a, dolorum voluptas nesciunt obcaecati sit neque vel, omnis fugiat!</p>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>