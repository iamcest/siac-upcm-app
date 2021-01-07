
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Documento de identidad:</strong> <span class="font-weight-light">{{ editedItem.document_type }}</span></p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>N° de identificación:</strong> <span class="font-weight-light">{{ editedItem.document_id }}</span></p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Fecha de nacimiento:</strong> <span class="font-weight-light">{{ editedItem.birthdate }}</span></p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Género:</strong>
                                  <span class="font-weight-light" v-if="editedItem.gender == 'F'">Femenino</span>
                                  <span class="font-weight-light" v-if="editedItem.gender == 'M'">Masculino</span>
                                </p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Dirección:</strong> <span class="font-weight-light">{{ editedItem.address }}</span></p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Correo electrónico:</strong> <span class="font-weight-light">{{ editedItem.email }}</span></p>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Teléfono:</strong> <span class="font-weight-light">{{ editedItem.telephone }}</span></p>
                              </v-col>
                              <v-col cols="12" md="4">
                                <p class="black--text text-h6"><strong>Plataformas de comunicación:</strong></p>
                                <v-row class="pt-0">
                                  <v-col cols="4" class="whatsapp-platform">
                                    <v-icon>mdi-whatsapp</v-icon>
                                    <v-icon class="green--text" v-if="editedItem.whatsapp">mdi-check</v-icon>
                                    <v-icon class="red--text" v-else>mdi-close</v-icon>
                                  </v-col>
                                  <v-col cols="4" class="telegram-platform">
                                    <v-icon>mdi-telegram</v-icon>
                                    <v-icon class="green--text" v-if="editedItem.telegram">mdi-check</v-icon>
                                    <v-icon class="red--text" v-else>mdi-close</v-icon>
                                  </v-col>
                                  <v-col cols="4" class="sms-platform">
                                    <v-icon>mdi-comment-text</v-icon>
                                    <v-icon class="green--text" v-if="editedItem.sms">mdi-check</v-icon>
                                    <v-icon class="red--text" v-else>mdi-close</v-icon>
                                  </v-col>
                                </v-row>
                              </v-col>

                              <v-col cols="12" sm="6" md="4">
                                <p class="black--text text-h6"><strong>Fecha de ingreso:</strong> <span class="font-weight-light">{{ editedItem.entry_date }}</span></p>
                              </v-col>