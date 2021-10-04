<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row class="py-12" style="min-height: 85vh">
            <v-col class="px-0" cols="12">
                <v-sheet color="primary">
                    <v-row>
                        <v-col cols="12" md="8" offset-md="2">
                            <h2 class="text-h4 white--text text-center">
                                POLÍTICA DE PRIVACIDAD
                            </h2>
                        </v-col>
                    </v-row>
                </v-sheet>
            </v-col>
            <v-col cols="12" md="8" lg="6" offset-md="2" offset-lg="3">
                <v-row ref="agreement_container">
                    <v-col cols="12">
                        <p class="subtitle-1 text-center">Al registrarme en esta suite de trabajo de la SIAC acepto expresamente que el
                            manejo de la información de cada paciente es confidencial; nunca será utilizada
                            o compartida con fines de docencia o investigación sin la autorización expresa
                            del paciente o sus familiares.
                            <br>
                            La información de los pacientes y la base de datos que genera nunca serán
                            compartidas ni utilizadas con fines comerciales o de lucro, <b>sin excepción</b>.
                        </p>
                    </v-col>
                    <v-col class="d-flex justify-center" cols="12">
                        <v-btn class="mr-4" color="secondary" @click="processPrivacyPolicy('deny')" :loading="loading">
                            Rechazar
                        </v-btn>
                        <v-btn color="primary" @click="processPrivacyPolicy('accept')" :loading="loading">Aceptar
                        </v-btn>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</v-main>