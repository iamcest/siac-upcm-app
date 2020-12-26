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

              <v-col cols="12" md="6">
                <label>Medida de presión arterial sistólica ambulatoria (automedida)</label>
                <v-text-field class="mt-3" v-model="vars.pas" suffix="mmHg" hint="Ingrese la unidad en mmHg" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Medida de presión arterial diastólica ambulatoria (automedida)</label>
                <v-text-field class="mt-3" v-model="vars.pad" suffix="mmHg" hint="Ingrese la unidad en mmHg" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="6" v-if="ampa_form">
                <label>Auto medida domiciliaria de la presión arterial (AMPA)</label>
                <v-text-field class="mt-3" v-model="vars.ampa" suffix="mmHg" hint="Ingrese los datos como en el ejemplo mostrado: 130/80"  placeholder="Ejemplo: 130/80" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="6" offset-md="3">
                <label class="text-center d-flex justify-center">Diagnóstico</label>
                <v-text-field class="mt-3 result-box" :value="diagnostic" outlined readonly required ></v-text-field>
              </v-col>
              <v-col cols="6" v-if="tracking !== ''">
                <h3 class="mb-4 grey--text text--darken-2">Seguimiento</h3>
                <p>{{ tracking }}</p>      
              </v-col>

              <v-col cols="6" v-if="treatment !== ''">
                <h3 class="mb-4 grey--text text--darken-2">Seguimiento</h3>
                <p>{{ Tratamiento }}</p>                   
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>