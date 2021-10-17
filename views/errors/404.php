<!-- Sizes your content based upon application components -->
<v-main class="login-container">

    <!-- Provides the application the proper gutter -->
    <v-container fluid>

        <v-row no-gutters class="align-center login-form-container">
            <v-col cols="12" md="8" class="mx-auto mt-auto">
                <v-sheet>
                    <v-row class="px-4">
                        <v-col class="d-flex justify-end" cols="12">
                            <v-img max-width="300px" src="<?php echo SITE_URL?>/public/img/Logo.png">
                            </v-img>
                        </v-col>
                        <v-col class="d-flex justify-center" cols="12">
                            <v-img src="<?php echo SITE_URL?>/public/img/not-found.svg" :max-width="$vuetify.breakpoint.mdAndDown ? '80vw' : '35vw'"></v-img>
                        </v-col>
                        <v-col cols="12">
                            <h1 class="text-h4 text-center">
                                Error 404 - Página no encontrada
                            </h1>
                        </v-col>
                        <v-col class="d-flex justify-center" cols="12">
                            <v-btn color="primary" href="<?php echo SITE_URL ?>">Ir a inicio</v-btn>
                        </v-col>
                    </v-row>
                </v-sheet>
            </v-col>
        </v-row>

    </v-container>
</v-main>