    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Tratamiento de la dislipidemia para reducir el riesgo residual</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>c-LDL</label>
                <v-text-field class="mt-3" v-model="calc.amount" hint="Ingrese la unidad en mg/dl" suffix="mg/dl" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>  
              <v-col cols="12">
                <h3 class="mb-4 grey--text text--darken-2">Tratamiento</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum iure doloribus, minima saepe quos nulla, velit! Enim, beatae maiores saepe a, dolorum voluptas nesciunt obcaecati sit neque vel, omnis fugiat!</p>
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRA: 1,6</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>                
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRR: 24%</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>                
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRR: 65</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>