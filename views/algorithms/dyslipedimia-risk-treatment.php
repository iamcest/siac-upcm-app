    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <?php echo new Template('parts/upcm_logo') ?>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Tratamiento de la dislipidemia para reducir el riesgo residual</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="6">
                <label>c-LDL</label>
                <v-text-field class="mt-3" v-model="c_ldl" hint="Ingrese la unidad en mg/dl" suffix="mg/dl" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Triglicéridos</label>
                <v-text-field class="mt-3" v-model="tg" hint="Ingrese la unidad en mg/dl" suffix="mg/dl" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="6">
                <label>c-No HDL</label>
                <v-text-field class="mt-3" v-model="c_no_hdl" hint="Ingrese la unidad en mg/dl" suffix="mg/dl" outlined required></v-text-field>
              </v-col>   

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Diagnóstico</label>
                <v-text-field class="mt-3 result-box" :value="diagnostic" outlined readonly required ></v-text-field>
              </v-col>
              <v-col cols="12" v-if="treatment.active">
                <h3 class="mb-4 grey--text text--darken-2">Tratamiento</h3>
                <p v-if="treatment !== ''">{{ treatment.text }}</p>                
              </v-col>
              <v-col cols="12" md="6" v-if="pcsk9_item">
                <h4>Inhibidores de la PCSK9</h4>
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
              </v-col>
              <v-col cols="12" md="6" v-if="ezt_item">
                <h4>EZT</h4>
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRA: 2.0</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>                
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRR: 6.4%</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>            
              </v-col>
              <v-col cols="12" md="6" v-if="ao3_fibratos_item">
                <h4>AO3 / Fibratos</h4>
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRA: 2.8</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>                
                <v-list-item class="pl-0">
                  <v-list-item-content class="grey--text text--darken-1">
                    <v-list-item-title>RRR: 24.8%</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>            
              </v-col>     
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>