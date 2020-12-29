                              <v-row class="full-width">
                                <v-col cols="12" sm="4">
                                  <label>Peso</label>
                                  <v-text-field class="mt-3" v-model="patient_anthropometry.weight" suffix="kg" outlined></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="4">
                                  <label>Talla</label>
                                  <v-text-field class="mt-3" v-model="patient_anthropometry.height" suffix="cm" outlined></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="4">
                                  <label>Cintura Abdominal</label>
                                  <v-text-field class="mt-3" v-model="patient_anthropometry.abdominal_waist" suffix="cm" outlined></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                  <v-btn color="secondary white--text" block @click="saveAnthropometry">
                                    Guardar
                                  </v-btn>
                                </v-col>
                              </v-row>
