	  <!-- START AFTER THIS-->
	  <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
	    	<?php echo new Template('parts/sidebar') ?>
    		<v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
    			<h2>Historial de cambios</h2>
                <div class="mt-10">
                    <v-alert border="top" color="primary"  colored-border elevation="2" prominent>
                      <v-icon class="alert-avatar">mdi-account-circle</v-icon>
                      John Doe añadió un nuevo paciente <span class="primary--text">(Juan Perez)</span>
                      <div class="grey--text grey--lighten-1 subtitle-2 time-past">Hace 30 minutos</div>
                    </v-alert>
                <div class="mt-5">
                    <v-alert border="top" color="primary"  colored-border elevation="2" prominent>
                      <v-icon class="alert-avatar">mdi-account-circle</v-icon>
                      John Doe eliminó el registro de un paciente <span class="primary--text">(Juan Perez)</span>
                      <div class="grey--text grey--lighten-1 subtitle-2 time-past">Hace 30 minutos</div>
                    </v-alert>
                <div class="mt-5">
                    <v-alert border="top" color="primary"  colored-border elevation="2" prominent>
                      <v-icon class="alert-avatar">mdi-account-circle</v-icon>
                      John Doe editó un paciente <span class="primary--text">(Juan Perez)</span>
                      <div class="grey--text grey--lighten-1 subtitle-2 time-past">Hace 30 minutos</div>
                    </v-alert>
                <div class="mt-5">
                    <v-alert border="top" color="primary"  colored-border elevation="2" prominent>
                      <v-icon class="alert-avatar">mdi-account-circle</v-icon>
                      John Doe añadió una cita con un paciente <span class="primary--text">(Juan Perez)</span>
                      <div class="grey--text grey--lighten-1 subtitle-2 time-past">Hace 30 minutos</div>
                    </v-alert>
                </div>
    		</v-col>
    	</v-row>
    </v-container>
  </v-main>